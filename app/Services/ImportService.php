<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\HomestayData;
use App\Data\ImportPreviewResult;
use App\Data\ImportResult;
use App\Data\ImportRowError;
use App\Data\PerformanceData;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\ImportException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Exports\ImportErrorExport;
use App\Imports\GenericArrayImport;
use App\Jobs\ProcessImportJob;
use App\Models\AuditLog;
use App\Models\Homestay;
use App\Models\Import;
use App\Models\Performance;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
        private readonly HomestayService $homestayService,
        private readonly PerformanceService $performanceService,
        private readonly Homestay $homestayModel,
        private readonly Performance $performanceModel,
    ) {}

    /**
     * Generate preview data for the uploaded file without mutating the database.
     */
    public function previewImport(UploadedFile $file, string $type): ImportPreviewResult
    {
        $collection = Excel::toCollection(new GenericArrayImport, $file);
        /** @var Collection<int, Collection<int, mixed>|array<int, mixed>> $rows */
        $rows = $collection->first() ?? collect();
        $normalizedRows = $this->normalizeRows($rows);
        $sample = $normalizedRows->take(self::PREVIEW_SAMPLE_LIMIT);

        $errors = [];
        $rowNumber = 2;
        foreach ($sample as $row) {
            $error = $this->validateRow($type, $row, $rowNumber);
            if ($error !== null) {
                $errors[] = $error;
            }
            $rowNumber++;
        }

        return new ImportPreviewResult(
            type: strtolower($type),
            totalRows: $normalizedRows->count(),
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
        if (! is_string($import->filename) || $import->filename === '' || ! Storage::disk(self::STORAGE_DISK)->exists($import->filename)) {
            throw new ImportException('Fail import tidak ditemui pada storan.');
        }

        $collection = Excel::toCollection(new GenericArrayImport, $import->filename, self::STORAGE_DISK);
        /** @var Collection<int, Collection<int, mixed>|array<int, mixed>> $rows */
        $rows = $collection->first() ?? collect();
        $normalizedRows = $this->normalizeRows($rows);
        $totalRows = $normalizedRows->count();

        $import->markAsProcessing();
        $import->update([
            'rows_total' => $totalRows,
            'rows_processed' => 0,
            'rows_success' => 0,
            'rows_failed' => 0,
        ]);

        /** @var array<int, ImportRowError> $errors */
        $errors = [];
        $processed = 0;
        $successful = 0;
        $failed = 0;
        $rowNumber = 2; // header assumed row 1

        $type = strtolower($import->type);

        try {
            foreach ($normalizedRows->chunk(self::CHUNK_SIZE) as $chunk) {
                foreach ($chunk as $row) {
                    $validationError = $this->validateRow($type, $row, $rowNumber);
                    if ($validationError !== null) {
                        $errors[] = $validationError;
                        $failed++;
                        $processed++;
                        $rowNumber++;

                        continue;
                    }

                    try {
                        $this->handleRow($type, $row);
                        $successful++;
                    } catch (ValidationException|BusinessRuleException|NotFoundException $exception) {
                        $errors[] = new ImportRowError($rowNumber, $exception->getMessage());
                        $failed++;
                    } catch (Throwable $exception) {
                        Log::error('Import row processing failed.', [
                            'import_id' => $import->id,
                            'row' => $rowNumber,
                            'message' => $exception->getMessage(),
                        ]);
                        $errors[] = new ImportRowError(
                            $rowNumber,
                            'Ralat tidak dijangka berlaku semasa memproses baris ini.',
                            ['exception' => $exception->getMessage()]
                        );
                        $failed++;
                    }

                    $processed++;
                    $rowNumber++;
                }

                $import->updateProgress($processed, $successful, $failed);
            }
        } catch (Throwable $exception) {
            $import->markAsFailed();
            $import->addError('Import gagal diproses.', ['exception' => $exception->getMessage()]);

            throw new ImportException('Import gagal diproses.', 0, $exception);
        }

        $errorReportPath = $this->generateErrorReport($import->id, $errors);

        $meta = $import->meta ?? [];
        if ($errorReportPath !== null) {
            $meta['error_report_path'] = $errorReportPath;
        }
        $meta['last_processed_at'] = now()->toISOString();

        $import->update([
            'status' => 'completed',
            'rows_processed' => $processed,
            'rows_success' => $successful,
            'rows_failed' => $failed,
            'meta' => $meta,
        ]);

        $import->updateValidationErrors(array_map(
            static function (ImportRowError $error): array {
                /** @var array<string, bool|float|int|string|null> $row */
                $row = [
                    'row' => $error->rowNumber,
                    'message' => $error->message,
                    'context' => $error->context === null ? null : json_encode($error->context),
                ];

                return $row;
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
                'rows_success' => $successful,
                'rows_failed' => $failed,
            ],
        ]);

        return new ImportResult($import->id, $processed, $successful, $failed, $errorReportPath);
    }

    /**
     * Convert a spreadsheet sheet to sanitized associative rows.
     *
     * @param  Collection<int, Collection<int, mixed>|array<int, mixed>>  $rows
     * @return Collection<int, array<string, bool|float|int|string|null>>
     *
     * @phpstan-return Collection<int, array<string, bool|float|int|string|null>>
     */
    private function normalizeRows(Collection $rows): Collection
    {
        if ($rows->isEmpty()) {
            /** @var Collection<int, array<string, bool|float|int|string|null>> $empty */
            $empty = collect();

            return $empty;
        }

        /** @var array<int, array<int, mixed>> $rowsArray */
        $rowsArray = $rows->map(static fn ($row) => $row instanceof Collection ? $row->toArray() : (array) $row)
            ->toArray();

        if ($rowsArray === []) {
            /** @var Collection<int, array<string, bool|float|int|string|null>> $empty */
            $empty = collect();

            return $empty;
        }

        $headingsRow = array_shift($rowsArray);
        $headings = collect($headingsRow ?? []);
        $headings = $headings->map(function ($heading) {
            if (is_string($heading)) {
                $heading = trim($heading);
            } elseif (is_scalar($heading)) {
                $heading = (string) $heading;
            } else {
                $heading = '';
            }
            $heading = Str::snake(Str::lower($heading));

            return $heading;
        });

        /** @var array<int, array<string, bool|float|int|string|null>> $normalizedArray */
        $normalizedArray = [];
        foreach (array_values($rowsArray) as $row) {
            if ($headings->isEmpty()) {
                continue;
            }

            $values = array_values($row);
            $values = array_pad($values, $headings->count(), null);

            /** @var array<string, bool|float|int|string|null> $assoc */
            $assoc = [];
            foreach ($headings as $index => $heading) {
                $v = $values[$index] ?? null;
                if (is_scalar($v) || $v === null) {
                    $assoc[$heading] = $v;
                } elseif (is_array($v)) {
                    $assoc[$heading] = json_encode($v) !== false ? json_encode($v) : null;
                } else {
                    $assoc[$heading] = null;
                }
            }

            $assoc = $this->canonicalizeRowKeys($assoc);
            $assoc = $this->trimScalarValues($assoc);
            if (! $this->rowIsEmpty($assoc)) {
                $normalizedArray[] = $assoc;
            }
        }

        /** @var Collection<int, array<string, bool|float|int|string|null>> $collection */
        $collection = collect($normalizedArray);

        return $collection;
    }

    /**
     * Map column aliases to canonical keys expected by the processors.
     *
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array<string, bool|float|int|string|null>
     */
    private function canonicalizeRowKeys(array $row): array
    {
        $aliases = [
            'cooperative_id' => 'id_koperasi',
            'koperasi_id' => 'id_koperasi',
            'cluster' => 'cluster_id',
            'model' => 'model_pengurusan',
            'pengurusan' => 'model_pengurusan',
            'status_operasi' => 'status',
        ];

        foreach ($aliases as $alias => $canonical) {
            if (array_key_exists($alias, $row) && ! array_key_exists($canonical, $row)) {
                $row[$canonical] = $row[$alias];
            }
        }

        return $row;
    }

    /**
     * Trim scalar values to keep CSV/Excel whitespace under control.
     *
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array<string, bool|float|int|string|null>
     */
    private function trimScalarValues(array $row): array
    {
        foreach ($row as $key => $value) {
            if (is_string($value)) {
                $row[$key] = trim($value);
            }
        }

        return $row;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function rowIsEmpty(array $row): bool
    {
        foreach ($row as $value) {
            if ($value === null) {
                continue;
            }

            if (is_string($value) && trim($value) === '') {
                continue;
            }

            return false;
        }

        return true;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function validateRow(string $type, array $row, int $rowNumber): ?ImportRowError
    {
        $rules = $this->rulesForType($type);
        if ($rules === []) {
            return null;
        }

        $validator = Validator::make($row, $rules);
        if ($validator->fails()) {
            $message = implode(' ', $validator->errors()->all());

            return new ImportRowError($rowNumber, $message);
        }

        return null;
    }

    /**
     * @return array<string, string>
     */
    private function rulesForType(string $type): array
    {
        return match (strtolower($type)) {
            'homestays' => [
                'nama' => 'required|string|max:255',
                'negeri' => 'required|string|max:50',
                'kapasiti' => 'required|numeric|min:0',
                'model_pengurusan' => 'required|in:koperasi,individu',
                'status' => 'required|in:Aktif,Tidak Aktif',
            ],
            'performances' => [
                'homestay_id' => 'required|integer|min:1',
                'bulan' => 'required|integer|between:1,12',
                'tahun' => 'required|integer|min:2000',
                'pelawat_domestik' => 'required|numeric|min:0',
                'pelawat_asing' => 'required|numeric|min:0',
                'pendapatan' => 'required|numeric|min:0',
                'sumber_lain' => 'nullable|numeric|min:0',
            ],
            default => [],
        };
    }

    /**
     * Route a normalized row to the appropriate domain handler.
     *
     * @param  array<string, scalar|null>  $row
     */
    private function handleRow(string $type, array $row): void
    {
        switch ($type) {
            case 'homestays':
                $this->upsertHomestay($row);

                return;

            case 'performances':
                $this->upsertPerformance($row);

                return;

            default:
                throw new ImportException('Jenis import tidak disokong: '.$type);
        }
    }

    /**
     * @param  array<string, scalar|null>  $row
     */
    private function upsertHomestay(array $row): void
    {
        $data = new HomestayData(
            nama: (string) ($row['nama'] ?? ''),
            negeri: (string) ($row['negeri'] ?? ''),
            alamat: isset($row['alamat']) && $row['alamat'] !== '' ? (string) $row['alamat'] : null,
            kapasiti: (int) ($row['kapasiti'] ?? 0),
            fasiliti: isset($row['fasiliti']) && $row['fasiliti'] !== '' ? (string) $row['fasiliti'] : null,
            modelPengurusan: (string) ($row['model_pengurusan'] ?? 'individu'),
            cooperativeId: isset($row['id_koperasi']) && $row['id_koperasi'] !== '' ? (int) $row['id_koperasi'] : null,
            status: (string) ($row['status'] ?? 'Aktif'),
            clusterId: isset($row['cluster_id']) && $row['cluster_id'] !== '' ? (int) $row['cluster_id'] : null,
        );

        $existing = $this->homestayModel->newQuery()
            ->where('nama', $data->nama)
            ->where('negeri', $data->negeri)
            ->first();

        if ($existing !== null) {
            $this->homestayService->updateHomestay($existing, $data);
        } else {
            $this->homestayService->createHomestay($data);
        }
    }

    /**
     * @param  array<string, scalar|null>  $row
     */
    private function upsertPerformance(array $row): void
    {
        $data = new PerformanceData(
            homestayId: (int) ($row['homestay_id'] ?? 0),
            bulan: (int) ($row['bulan'] ?? 0),
            tahun: (int) ($row['tahun'] ?? 0),
            pelawatDomestik: (int) ($row['pelawat_domestik'] ?? 0),
            pelawatAsing: (int) ($row['pelawat_asing'] ?? 0),
            pendapatan: (float) ($row['pendapatan'] ?? 0),
            sumberLain: (float) ($row['sumber_lain'] ?? 0),
        );

        $existing = $this->performanceModel->newQuery()
            ->where('homestay_id', $data->homestayId)
            ->where('bulan', $data->bulan)
            ->where('tahun', $data->tahun)
            ->first();

        if ($existing !== null) {
            $this->performanceService->updatePerformance($existing, $data);
        } else {
            $this->performanceService->recordPerformance($data);
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
