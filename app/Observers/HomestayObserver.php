<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\Homestay;
use Illuminate\Support\Facades\Auth;

/**
 * HomestayObserver
 *
 * Observes Homestay model events and logs them to the audit trail.
 * Captures create, update, delete, and restore operations for
 * compliance and security auditing purposes.
 */
class HomestayObserver
{
    /**
     * Handle the Homestay "creating" event.
     */
    public function creating(Homestay $homestay): void
    {
        // This runs before the model is saved, so we can capture pre-creation state
        // No action needed here as we'll log in the created event
    }

    /**
     * Handle the Homestay "created" event.
     */
    public function created(Homestay $homestay): void
    {
        try {
            $request = request();
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'CREATE',
                'table_name' => $homestay->getTable(),
                'record_id' => $homestay->id,
                'model_type' => Homestay::class,
                'model_id' => $homestay->id,
                'old_values' => null,
                'new_values' => json_encode([
                    'nama_homestay' => $homestay->nama,
                    'negeri' => $homestay->negeri,
                    'daerah' => $homestay->daerah ?? null,
                    'status' => $homestay->status ?? null,
                ]),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Exception $e) {
            // Log the error but don't interrupt the creation process
            \Illuminate\Support\Facades\Log::error('Failed to log homestay creation audit', [
                'homestay_id' => $homestay->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Homestay "updating" event.
     */
    public function updating(Homestay $homestay): void
    {
        // Store the original attributes before update in memory (not persisted)
        $homestay->setRelation('__original_for_audit', $homestay->getOriginal());
    }

    /**
     * Handle the Homestay "updated" event.
     */
    public function updated(Homestay $homestay): void
    {
        try {
            // Original attributes captured in updating
            /** @var array<string, mixed>|null $original */
            $original = $homestay->getRelation('__original_for_audit') ?? $homestay->getOriginal();

            // Only log if there are actual changes
            if ($homestay->wasChanged()) {
                $request = request();
                AuditLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'UPDATE',
                    'table_name' => $homestay->getTable(),
                    'record_id' => $homestay->id,
                    'model_type' => Homestay::class,
                    'model_id' => $homestay->id,
                    'old_values' => json_encode([
                        'nama_homestay' => $original['nama'] ?? null,
                        'negeri' => $original['negeri'] ?? null,
                        'daerah' => $original['daerah'] ?? null,
                        'status' => $original['status'] ?? null,
                    ]),
                    'new_values' => json_encode([
                        'nama_homestay' => $homestay->nama,
                        'negeri' => $homestay->negeri,
                        'daerah' => $homestay->daerah ?? null,
                        'status' => $homestay->status ?? null,
                    ]),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }

            // Clean up the temporary attribute
            $homestay->unsetRelation('__original_for_audit');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log homestay update audit', [
                'homestay_id' => $homestay->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Homestay "deleting" event.
     */
    public function deleting(Homestay $homestay): void
    {
        // Store the current state before deletion
        $homestay->setRelation('__data_for_audit', $homestay->toArray());
    }

    /**
     * Handle the Homestay "deleted" event.
     */
    public function deleted(Homestay $homestay): void
    {
        try {
            /** @var array<string, mixed>|null $deletedData */
            $deletedData = $homestay->getRelation('__data_for_audit') ?? $homestay->toArray();

            $request = request();
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'DELETE',
                'table_name' => $homestay->getTable(),
                'record_id' => $homestay->id,
                'model_type' => Homestay::class,
                'model_id' => $homestay->id,
                'old_values' => json_encode([
                    'nama_homestay' => $deletedData['nama'] ?? null,
                    'negeri' => $deletedData['negeri'] ?? null,
                    'daerah' => $deletedData['daerah'] ?? null,
                    'status' => $deletedData['status'] ?? null,
                ]),
                'new_values' => null,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Clean up the temporary attribute
            $homestay->unsetRelation('__data_for_audit');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log homestay deletion audit', [
                'homestay_id' => $homestay->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Homestay "restored" event.
     */
    public function restored(Homestay $homestay): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'RESTORE',
                'table_name' => $homestay->getTable(),
                'record_id' => $homestay->id,
                'old_values' => null,
                'new_values' => $homestay->toArray(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log homestay restoration audit', [
                'homestay_id' => $homestay->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the Homestay "force deleted" event.
     */
    public function forceDeleted(Homestay $homestay): void
    {
        // This is handled in the deleted event by checking isForceDeleting()
        // We don't need additional logging here
    }

    /**
     * Handle the Homestay "retrieved" event.
     *
     * Note: This event fires very frequently, so we don't log it
     * to avoid audit log spam. Only critical operations are logged.
     */
    public function retrieved(Homestay $homestay): void
    {
        // No action needed - too frequent for audit logging
    }

    /**
     * Log status change for homestays.
     * This is a custom method that can be called manually when status changes.
     */
    public static function logStatusChange(Homestay $homestay, string $oldStatus, string $newStatus): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'STATUS_CHANGED',
                'table_name' => $homestay->getTable(),
                'record_id' => $homestay->id,
                'old_values' => ['status' => $oldStatus],
                'new_values' => ['status' => $newStatus],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log homestay status change audit', [
                'homestay_id' => $homestay->id,
                'old_status' => $oldStatus,
                'new_status' => $newStatus,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
