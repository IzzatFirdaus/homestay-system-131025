<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\Performance;
use Illuminate\Support\Facades\Auth;

/**
 * PerformanceObserver
 *
 * Observes Performance model events and logs them to the audit trail.
 * Performance data is critical for analytics and reporting, so all
 * changes must be carefully audited for compliance purposes.
 */
class PerformanceObserver
{
    /**
     * Handle the Performance "creating" event.
     */
    public function creating(Performance $performance): void
    {
        // No action needed here - we'll log in the created event
    }

    /**
     * Handle the Performance "created" event.
     */
    public function created(Performance $performance): void
    {
        try {
            // Load homestay relationship for context
            $performance->load('homestay');

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'created',
                'model' => Performance::class,
                'model_id' => $performance->id,
                'before' => null,
                'after' => array_merge($performance->toArray(), [
                    'homestay_nama' => $performance->homestay->nama ?? 'Unknown',
                    'homestay_negeri' => $performance->homestay->negeri ?? 'Unknown',
                ]),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance creation audit', [
                'performance_id' => $performance->id,
                'homestay_id' => $performance->homestay_id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Performance "updating" event.
     */
    public function updating(Performance $performance): void
    {
        // Store the original attributes before update
        $performance->_original_for_audit = $performance->getOriginal();
    }

    /**
     * Handle the Performance "updated" event.
     */
    public function updated(Performance $performance): void
    {
        try {
            // Get the original attributes stored in updating event
            $original = $performance->_original_for_audit ?? $performance->getOriginal();

            // Only log if there are actual changes
            if ($performance->wasChanged()) {
                // Load homestay relationship for context
                $performance->load('homestay');

                AuditLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'updated',
                    'model' => Performance::class,
                    'model_id' => $performance->id,
                    'before' => array_merge($original, [
                        'homestay_nama' => $performance->homestay->nama ?? 'Unknown',
                        'homestay_negeri' => $performance->homestay->negeri ?? 'Unknown',
                    ]),
                    'after' => array_merge($performance->toArray(), [
                        'homestay_nama' => $performance->homestay->nama ?? 'Unknown',
                        'homestay_negeri' => $performance->homestay->negeri ?? 'Unknown',
                    ]),
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
            }

            // Clean up the temporary attribute
            unset($performance->_original_for_audit);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance update audit', [
                'performance_id' => $performance->id,
                'homestay_id' => $performance->homestay_id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Performance "deleting" event.
     */
    public function deleting(Performance $performance): void
    {
        // Store the current state before deletion
        $performance->load('homestay');
        $performance->_data_for_audit = array_merge($performance->toArray(), [
            'homestay_nama' => $performance->homestay->nama ?? 'Unknown',
            'homestay_negeri' => $performance->homestay->negeri ?? 'Unknown',
        ]);
    }

    /**
     * Handle the Performance "deleted" event.
     */
    public function deleted(Performance $performance): void
    {
        try {
            $deletedData = $performance->_data_for_audit ?? $performance->toArray();

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'deleted',
                'model' => Performance::class,
                'model_id' => $performance->id,
                'before' => $deletedData,
                'after' => null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            // Clean up the temporary attribute
            unset($performance->_data_for_audit);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance deletion audit', [
                'performance_id' => $performance->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Performance "restored" event.
     */
    public function restored(Performance $performance): void
    {
        try {
            $performance->load('homestay');

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'restored',
                'model' => Performance::class,
                'model_id' => $performance->id,
                'before' => null,
                'after' => array_merge($performance->toArray(), [
                    'homestay_nama' => $performance->homestay->nama ?? 'Unknown',
                    'homestay_negeri' => $performance->homestay->negeri ?? 'Unknown',
                ]),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance restoration audit', [
                'performance_id' => $performance->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log bulk import of performance data.
     * This is a custom method to be called during import operations.
     *
     * @param  array<Performance>  $performances
     */
    public static function logBulkImport(array $performances, int $importId): void
    {
        try {
            $performanceIds = array_map(fn ($p) => $p->id, $performances);
            $homestayIds = array_unique(array_map(fn ($p) => $p->homestay_id, $performances));

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'bulk_imported',
                'model' => Performance::class,
                'model_id' => null,
                'before' => null,
                'after' => [
                    'import_id' => $importId,
                    'performance_count' => count($performances),
                    'performance_ids' => $performanceIds,
                    'affected_homestays' => $homestayIds,
                    'import_summary' => [
                        'total_records' => count($performances),
                        'unique_homestays' => count($homestayIds),
                    ],
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance bulk import audit', [
                'import_id' => $importId,
                'performance_count' => count($performances),
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log data validation errors during import.
     * This helps track data quality issues.
     *
     * @param  array<string, mixed>  $validationErrors
     */
    public static function logValidationErrors(array $validationErrors, int $importId): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'validation_failed',
                'model' => Performance::class,
                'model_id' => null,
                'before' => null,
                'after' => [
                    'import_id' => $importId,
                    'validation_errors' => $validationErrors,
                    'error_count' => count($validationErrors),
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance validation errors audit', [
                'import_id' => $importId,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log performance data corrections.
     * This method should be called when data is manually corrected.
     *
     * @param  array<string, mixed>  $corrections
     */
    public static function logDataCorrection(Performance $performance, array $corrections, string $reason): void
    {
        try {
            $before = $corrections['before'] ?? null;
            $after = $corrections['after'] ?? [];
            $afterArray = is_array($after) ? $after : [];

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'data_corrected',
                'model' => Performance::class,
                'model_id' => $performance->id,
                'before' => $before,
                'after' => array_merge($afterArray, [
                    'correction_reason' => $reason,
                    'corrected_fields' => array_keys($afterArray),
                ]),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log performance data correction audit', [
                'performance_id' => $performance->id,
                'reason' => $reason,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
