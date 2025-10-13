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
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'created',
                'model' => Homestay::class,
                'model_id' => $homestay->id,
                'before' => null,
                'after' => $homestay->toArray(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
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
        // Store the original attributes before update
        $homestay->_original_for_audit = $homestay->getOriginal();
    }

    /**
     * Handle the Homestay "updated" event.
     */
    public function updated(Homestay $homestay): void
    {
        try {
            // Get the original attributes stored in updating event
            $original = $homestay->_original_for_audit ?? $homestay->getOriginal();

            // Only log if there are actual changes
            if ($homestay->wasChanged()) {
                AuditLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'updated',
                    'model' => Homestay::class,
                    'model_id' => $homestay->id,
                    'before' => $original,
                    'after' => $homestay->toArray(),
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
            }

            // Clean up the temporary attribute
            unset($homestay->_original_for_audit);
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
        $homestay->_data_for_audit = $homestay->toArray();
    }

    /**
     * Handle the Homestay "deleted" event.
     */
    public function deleted(Homestay $homestay): void
    {
        try {
            $deletedData = $homestay->_data_for_audit ?? $homestay->toArray();

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => $homestay->isForceDeleting() ? 'force_deleted' : 'deleted',
                'model' => Homestay::class,
                'model_id' => $homestay->id,
                'before' => $deletedData,
                'after' => null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            // Clean up the temporary attribute
            unset($homestay->_data_for_audit);
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
                'action' => 'restored',
                'model' => Homestay::class,
                'model_id' => $homestay->id,
                'before' => null,
                'after' => $homestay->toArray(),
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
                'action' => 'status_changed',
                'model' => Homestay::class,
                'model_id' => $homestay->id,
                'before' => ['status' => $oldStatus],
                'after' => ['status' => $newStatus],
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
