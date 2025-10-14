<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\Import;
use Illuminate\Support\Facades\Auth;

/**
 * ImportObserver
 *
 * Observes Import model events and logs them to the audit trail.
 * Import operations are critical for data integrity and must be
 * comprehensively audited for compliance and troubleshooting.
 */
class ImportObserver
{
    /**
     * Handle the Import "creating" event.
     */
    public function creating(Import $import): void
    {
        // No action needed here - we'll log in the created event
    }

    /**
     * Handle the Import "created" event.
     */
    public function created(Import $import): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'import_initiated',
                'model' => Import::class,
                'model_id' => $import->id,
                'before' => null,
                'after' => [
                    'nama_fail' => $import->nama_fail,
                    'jenis_import' => $import->jenis_import,
                    'status' => $import->status,
                    'negeri' => $import->negeri,
                    'koperasi_id' => $import->koperasi_id,
                    'saiz_fail' => $import->saiz_fail,
                    'jumlah_baris' => $import->jumlah_baris,
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import creation audit', [
                'import_id' => $import->id,
                'file_name' => $import->nama_fail,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Import "updating" event.
     */
    public function updating(Import $import): void
    {
        // Store the original attributes before update
        $import->_original_for_audit = $import->getOriginal();
    }

    /**
     * Handle the Import "updated" event.
     */
    public function updated(Import $import): void
    {
        try {
            // Get the original attributes stored in updating event
            $original = $import->_original_for_audit ?? $import->getOriginal();

            // Only log if there are actual changes
            if ($import->wasChanged()) {
                $action = $this->determineUpdateAction($import, $original);

                $originalData = is_array($original) ? $original : [];
                $afterData = $import->toArray();

                AuditLog::create([
                    'user_id' => Auth::id(),
                    'action' => $action,
                    'model' => Import::class,
                    'model_id' => $import->id,
                    'before' => $this->sanitizeImportData($originalData),
                    'after' => $this->sanitizeImportData($afterData),
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
            }

            // Clean up the temporary attribute
            unset($import->_original_for_audit);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import update audit', [
                'import_id' => $import->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Import "deleting" event.
     */
    public function deleting(Import $import): void
    {
        // Store the current state before deletion
        $import->_data_for_audit = $this->sanitizeImportData($import->toArray());
    }

    /**
     * Handle the Import "deleted" event.
     */
    public function deleted(Import $import): void
    {
        try {
            $deletedData = $import->_data_for_audit ?? $this->sanitizeImportData($import->toArray());

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'import_deleted',
                'model' => Import::class,
                'model_id' => $import->id,
                'before' => $deletedData,
                'after' => null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            // Clean up the temporary attribute
            unset($import->_data_for_audit);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import deletion audit', [
                'import_id' => $import->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Import "restored" event.
     */
    public function restored(Import $import): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'import_restored',
                'model' => Import::class,
                'model_id' => $import->id,
                'before' => null,
                'after' => $this->sanitizeImportData($import->toArray()),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import restoration audit', [
                'import_id' => $import->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Determine the specific action based on what was updated.
     *
     * @param  array<string, mixed>  $original
     */
    private function determineUpdateAction(Import $import, array $original): string
    {
        // Check if status changed
        if (isset($original['status']) && $import->status !== $original['status']) {
            $newStatus = $import->status;

            return match ($newStatus) {
                'processing' => 'import_started',
                'completed' => 'import_completed',
                'failed' => 'import_failed',
                'cancelled' => 'import_cancelled',
                default => 'import_status_changed'
            };
        }

        // Check if validation results were updated
        if ($import->wasChanged(['hasil_validasi', 'mesej_ralat'])) {
            return 'import_validated';
        }

        // Check if progress was updated
        if ($import->wasChanged(['progress', 'baris_berjaya', 'baris_gagal'])) {
            return 'import_progress_updated';
        }

        return 'import_updated';
    }

    /**
     * Sanitize import data to remove large or sensitive fields.
     *
     * @param  array<string|int, mixed>  $data
     * @return array<string, mixed>
     */
    private function sanitizeImportData(array $data): array
    {
        $sanitized = [];

        foreach ($data as $key => $value) {
            $sanitized[(string) $key] = $value;
        }

        // Remove large fields that would bloat the audit log
        $fieldsToRemove = ['hasil_validasi', 'data_preview', 'raw_data'];

        foreach ($fieldsToRemove as $field) {
            if (array_key_exists($field, $sanitized)) {
                $originalValue = $sanitized[$field];
                $originalSize = is_string($originalValue) ? strlen($originalValue) : strlen(serialize($originalValue));
                $sanitized[$field] = [
                    '_truncated' => true,
                    '_original_size' => $originalSize,
                    '_summary' => 'Large data field truncated for audit log',
                ];
            }
        }

        return $sanitized;
    }

    /**
     * Log import validation results.
     * This is a custom method to be called during validation phase.
     *
     * @param  array<string, mixed>  $validationResults
     */
    public static function logValidation(Import $import, array $validationResults): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'import_validation_completed',
                'model' => Import::class,
                'model_id' => $import->id,
                'before' => null,
                'after' => [
                    'validation_summary' => [
                        'total_rows' => $validationResults['total_rows'] ?? 0,
                        'valid_rows' => $validationResults['valid_rows'] ?? 0,
                        'invalid_rows' => $validationResults['invalid_rows'] ?? 0,
                        'error_types' => $validationResults['error_types'] ?? [],
                    ],
                    'file_info' => [
                        'nama_fail' => $import->nama_fail,
                        'jenis_import' => $import->jenis_import,
                        'saiz_fail' => $import->saiz_fail,
                    ],
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import validation audit', [
                'import_id' => $import->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log import processing completion.
     * This should be called when the import processing finishes.
     *
     * @param  array<string, mixed>  $results
     */
    public static function logProcessingCompletion(Import $import, array $results): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'import_processing_completed',
                'model' => Import::class,
                'model_id' => $import->id,
                'before' => null,
                'after' => [
                    'processing_results' => [
                        'total_processed' => $results['total_processed'] ?? 0,
                        'successful_inserts' => $results['successful_inserts'] ?? 0,
                        'successful_updates' => $results['successful_updates'] ?? 0,
                        'failed_operations' => $results['failed_operations'] ?? 0,
                        'processing_time_seconds' => $results['processing_time'] ?? 0,
                    ],
                    'file_info' => [
                        'nama_fail' => $import->nama_fail,
                        'jenis_import' => $import->jenis_import,
                        'final_status' => $import->status,
                    ],
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import processing completion audit', [
                'import_id' => $import->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log import error details.
     * This should be called when import fails with detailed error information.
     *
     * @param  array<string, mixed>  $errorDetails
     */
    public static function logImportError(Import $import, array $errorDetails): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'import_error_logged',
                'model' => Import::class,
                'model_id' => $import->id,
                'before' => null,
                'after' => [
                    'error_details' => $errorDetails,
                    'error_context' => [
                        'nama_fail' => $import->nama_fail,
                        'jenis_import' => $import->jenis_import,
                        'progress_at_failure' => $import->progress,
                        'rows_processed' => $import->baris_berjaya + $import->baris_gagal,
                    ],
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log import error audit', [
                'import_id' => $import->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
