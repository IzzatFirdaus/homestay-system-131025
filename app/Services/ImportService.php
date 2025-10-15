<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\ImportPreviewResult;
use App\Data\ImportResult;
use App\Data\ImportRowError;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\ImportException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Exports\ImportErrorExport;
use App\Imports\GenericArrayImport;
use App\Jobs\ProcessImportJob;
use App\Models\AuditLog;
use App\Models\Import;
use App\Services\Import\HomestayImportProcessor;
use App\Services\Import\ImportCounters;
use App\Services\Import\PerformanceImportProcessor;
use App\Services\Import\RowNormalizer;
use App\Services\Import\RowValidator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use JsonException;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

/**
 * Orchestrates spreadsheet imports across supported domains.
 */
final class ImportService
{
    private const PREVIEW_SAMPLE_LIMIT = 25;

    private const CHUNK_SIZE = 500;

    private const QUEUE_THRESHOLD = 1000;

    private const QUEUE_FILESIZE_THRESHOLD = 2_097_152; // 2MB

    private const STORAGE_DISK = 'local';

    public function __construct(
        private readonly Import $importModel,
        private readonly AuditLog $auditLogModel,
        private readonly RowNormalizer $rowNormalizer,
        private readonly RowValidator $rowValidator,
        private readonly HomestayImportProcessor $homestayProcessor,
        private readonly PerformanceImportProcessor $performanceProcessor,
    ) {}

    /**
     * Generate preview data for the uploaded file without mutating the database.
     */
    public function previewImport(UploadedFile $file, string $type): ImportPreviewResult
    {
        $collection = Excel::toCollection(new GenericArrayImport, $file);
        /** @var Collection<int, Collection<int, mixed>|array<int, mixed>> $rows */
        $rows = $collection->first() ?? collect();
        /** @var array<int, array<string, bool|float|int|string|null>> $normalized */
        $normalized = $this->rowNormalizer->normalize($rows);
        /** @var Collection<int, array<string, bool|float|int|string|null>> $normalizedRows */
        $normalizedRows = collect($normalized);
        /** @var Collection<int, array<string, bool|float|int|string|null>> $sample */
        $sample = $normalizedRows->take(self::PREVIEW_SAMPLE_LIMIT);

        /** @var list<ImportRowError> $errors */
        $errors = [];
        $rowNumber = 2;
        foreach ($sample as $row) {
            $error = $this->rowValidator->validate($type, $row, $rowNumber);
            if ($error !== null) {
                $errors[] = $error;
            }
            $rowNumber++;
        }

        return new ImportPreviewResult(
            type: strtolower($type),
            totalRows: $normalizedRows->count(),
            // @phpstan-ignore-next-line (Collection generic covariance issue)
            sampleRows: $sample,
            errors: $errors,
        );
    }

    /**
     * Process an import in-place or queue it if the payload is large.
     *
     * @throws ImportException
     */
    public function processImport(int $importId): ImportResult
    {
        /** @var Import|null $import */
        $import = $this->importModel->newQuery()->find($importId);
        if ($import === null) {
            throw new NotFoundException('Rekod import tidak ditemui.');
        }

        if ($import->is_processing) {
            throw new BusinessRuleException('Import sedang diproses. Sila cuba lagi kemudian.');
        }

        if ($this->shouldQueue($import)) {
            ProcessImportJob::dispatch($importId)->afterCommit();

            return new ImportResult(
                importId: $import->id,
                processed: $import->rows_processed,
                succeeded: $import->rows_success,
                failed: $import->rows_failed,
                errorReportPath: null,
            );
        }

        return $this->runImport($import);
    }

    /**
     * Execute import logic when triggered from the queue worker.
     */
    public function runQueuedImport(int $importId): void
    {
        /** @var Import|null $import */
        $import = $this->importModel->newQuery()->find($importId);
        if ($import === null) {
            Log::warning('Import skipped – record missing.', ['import_id' => $importId]);

            return;
        }

        try {
            $this->runImport($import);
        } catch (ImportException $exception) {
            Log::error('Import queued run failed.', [
                'import_id' => $importId,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Decide whether heavy processing should be deferred to the queue.
     */
    private function shouldQueue(Import $import): bool
    {
        if ($import->rows_total > self::QUEUE_THRESHOLD) {
            return true;
        }

        try {
            if (! is_string($import->filename) || $import->filename === '') {
                return false;
            }

            $size = Storage::disk(self::STORAGE_DISK)->size($import->filename);

            return $size > self::QUEUE_FILESIZE_THRESHOLD;
        } catch (Throwable) {
            return false;
        }
    }

    /**
     * Perform row-by-row import, returning summary metrics.
     *
     * @throws ImportException
     */
    private function runImport(Import $import): ImportResult
    {
        $filename = $import->filename;
        if (! is_string($filename) || $filename === '' || ! Storage::disk(self::STORAGE_DISK)->exists($filename)) {
            throw new ImportException('Fail import tidak ditemui pada storan.');
        }

        $normalizedRows = $this->loadNormalizedRows($filename);
        /** @var Collection<int, array<string, bool|float|int|string|null>> $normalizedRows */
        $totalRows = $normalizedRows->count();

        $this->beginProcessing($import, $totalRows);

        /** @var array<int, ImportRowError> $errors */
        $errors = [];
        $counters = new ImportCounters;
        $type = strtolower($import->type);

        try {
            $this->processChunks($type, $normalizedRows, $import, $counters, $errors);
        } catch (Throwable $exception) {
            $this->handleImportFailure($import, $exception);

            throw new ImportException('Import gagal diproses.', 0, $exception);
        }

        return $this->finalizeImport($import, $type, $totalRows, $counters, $errors);
    }

    /**
     * Load and normalize rows from an import file.
     *
     * @return Collection<int, array<string, bool|float|int|string|null>>
     *
     * @throws ImportException
     */
    private function loadNormalizedRows(string $filename): Collection
    {
        if ($filename === '') {
            throw new ImportException('Nama fail import tidak sah.');
        }

        $collection = Excel::toCollection(new GenericArrayImport, $filename, self::STORAGE_DISK);
        /** @var Collection<int, Collection<int, mixed>|array<int, mixed>> $rows */
        $rows = $collection->first() ?? collect();
        /** @var array<int, array<string, bool|float|int|string|null>> $normalized */
        $normalized = $this->rowNormalizer->normalize($rows);

        /** @var Collection<int, array<string, bool|float|int|string|null>> $result */
        $result = collect($normalized);

        return $result;
    }

    private function beginProcessing(Import $import, int $totalRows): void
    {
        $import->markAsProcessing();
        $import->update([
            'rows_total' => $totalRows,
            'rows_processed' => 0,
            'rows_success' => 0,
            'rows_failed' => 0,
        ]);
    }

    /**
     * @param  Collection<int, array<string, bool|float|int|string|null>>  $rows
     * @param  array<int, ImportRowError>  $errors
     *
     * @param-out array<int, ImportRowError> $errors
     */
    private function processChunks(string $type, Collection $rows, Import $import, ImportCounters $counters, array &$errors): void
    {
        foreach ($rows->chunk(self::CHUNK_SIZE) as $chunk) {
            /** @var Collection<int, array<string, bool|float|int|string|null>> $chunk */
            $this->processChunk($type, $chunk, $import, $counters, $errors);
            $import->updateProgress($counters->processed(), $counters->succeeded(), $counters->failed());
        }
    }

    /**
     * @param  Collection<int, array<string, bool|float|int|string|null>>  $chunk
     * @param  array<int, ImportRowError>  $errors
     *
     * @param-out array<int, ImportRowError> $errors
     */
    private function processChunk(string $type, Collection $chunk, Import $import, ImportCounters $counters, array &$errors): void
    {
        foreach ($chunk as $row) {
            $this->processRow($type, $row, $import, $counters, $errors);
        }
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     * @param  array<int, ImportRowError>  $errors
     *
     * @param-out array<int, ImportRowError> $errors
     */
    private function processRow(string $type, array $row, Import $import, ImportCounters $counters, array &$errors): void
    {
        $currentRow = $counters->currentRow();
        $validationError = $this->rowValidator->validate($type, $row, $currentRow);
        if ($validationError !== null) {
            $errors[] = $validationError;
            $counters->recordFailure();

            return;
        }

        try {
            $this->handleRow($type, $row);
            $counters->recordSuccess();

            return;
        } catch (ValidationException|BusinessRuleException|NotFoundException $exception) {
            $errors[] = new ImportRowError($currentRow, $exception->getMessage());
        } catch (Throwable $exception) {
            Log::error('Import row processing failed.', [
                'import_id' => $import->id,
                'row' => $currentRow,
                'message' => $exception->getMessage(),
            ]);
            $errors[] = new ImportRowError(
                $currentRow,
                'Ralat tidak dijangka berlaku semasa memproses baris ini.',
                ['exception' => $exception->getMessage()]
            );
        }

        $counters->recordFailure();
    }

    /**
     * @param  array<int, ImportRowError>  $errors
     */
    private function finalizeImport(Import $import, string $type, int $totalRows, ImportCounters $counters, array $errors): ImportResult
    {
        $errorReportPath = $this->generateErrorReport($import->id, $errors);

        $meta = $import->meta ?? [];
        if ($errorReportPath !== null) {
            $meta['error_report_path'] = $errorReportPath;
        }
        $meta['last_processed_at'] = now()->toISOString();

        $import->update([
            'status' => 'completed',
            'rows_processed' => $counters->processed(),
            'rows_success' => $counters->succeeded(),
            'rows_failed' => $counters->failed(),
            'meta' => $meta,
        ]);

        $import->updateValidationErrors(array_map(
            static function (ImportRowError $error): array {
                $context = null;
                if ($error->context !== null) {
                    try {
                        $context = json_encode($error->context, JSON_THROW_ON_ERROR);
                    } catch (JsonException) {
                        $context = null;
                    }
                }

                return [
                    'row' => $error->rowNumber,
                    'message' => $error->message,
                    'context' => $context,
                ];
            },
            $errors
        ));

        $this->auditLogModel->newQuery()->create([
            'user_id' => $import->user_id,
            'action' => 'imported',
            'model' => Import::class,
            'model_id' => $import->id,
            'before' => null,
            'after' => [
                'type' => $type,
                'rows_total' => $totalRows,
                'rows_success' => $counters->succeeded(),
                'rows_failed' => $counters->failed(),
            ],
        ]);

        return new ImportResult($import->id, $counters->processed(), $counters->succeeded(), $counters->failed(), $errorReportPath);
    }

    private function handleImportFailure(Import $import, Throwable $exception): void
    {
        $import->markAsFailed();
        $import->addError('Import gagal diproses.', ['exception' => $exception->getMessage()]);
    }

    /**
     * Route a normalized row to the appropriate domain handler.
     *
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function handleRow(string $type, array $row): void
    {
        switch ($type) {
            case 'homestays':
                $this->homestayProcessor->process($row);

                return;

            case 'performances':
                $this->performanceProcessor->process($row);

                return;

            default:
                throw new ImportException('Jenis import tidak disokong: '.$type);
        }
    }

    /**
     * @param  array<int, ImportRowError>  $errors
     */
    private function generateErrorReport(int $importId, array $errors): ?string
    {
        if ($errors === []) {
            return null;
        }

        /** @var Collection<int, array{Row:int,Message:string,Context:string}> $rows */
        $rows = collect($errors)->map(static function (ImportRowError $error): array {
            $context = '';
            if ($error->context !== null) {
                try {
                    $context = json_encode($error->context, JSON_THROW_ON_ERROR);
                } catch (JsonException) {
                    $context = '[[context encoding failed]]';
                }
            }

            return [
                'Row' => $error->rowNumber,
                'Message' => $error->message,
                'Context' => $context,
            ];
        });

        $path = sprintf('imports/error-reports/%d-%s.xlsx', $importId, now()->format('YmdHis'));
        Excel::store(new ImportErrorExport($rows), $path, self::STORAGE_DISK);

        return $path;
    }
}
