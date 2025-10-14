<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * UserObserver
 *
 * Observes User model events and logs them to the audit trail.
 * User management operations are particularly sensitive and
 * require comprehensive auditing for security compliance.
 */
class UserObserver
{
    /**
     * Store original attributes temporarily during update operations.
     * @var array<int, array<string, mixed>>
     */
    private static array $originalAttributes = [];

    /**
     * Store data temporarily during delete operations.
     * @var array<int, array<string, mixed>>
     */
    private static array $deleteData = [];

    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        // No action needed here - we'll log in the created event
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        try {
            $userData = $user->toArray();
            // Never log password or sensitive data
            unset($userData['password']);

            $payload = [
                'user_id' => Auth::id(),
                'action' => 'user_created',
                'model' => User::class,
                'model_id' => $user->id,
                'before' => null,
                'after' => $userData,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ];

            // Diagnostic log to capture exact payload used for AuditLog creation.
            \Illuminate\Support\Facades\Log::info('AuditLog::create payload (user_created)', array_merge(['source' => 'UserObserver::created'], $payload));

            AuditLog::create($payload);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user creation audit', [
                'user_id' => $user->id,
                'user_email' => $user->email,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the User "updating" event.
     */
    public function updating(User $user): void
    {
        // Store the original attributes before update, excluding sensitive data
        $original = $user->getOriginal();
        unset($original['password'], $original['remember_token']);
        self::$originalAttributes[$user->id ?? 0] = $original;
    }

    /**
     * Handle the User "saving" event to prevent audit attrs from being saved.
     */
    public function saving(User $user): void
    {
        // This method is no longer needed
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        try {
            // Get the original attributes stored in updating event
            $original = self::$originalAttributes[$user->id] ?? $user->getOriginal();
            $originalData = is_array($original) ? $original : [];

            // Only log if there are actual changes
            if ($user->wasChanged()) {
                $userData = $user->toArray();
                // Never log password or sensitive data
                unset($userData['password'], $userData['remember_token']);

                // Determine the type of update
                $action = $this->determineUpdateAction($user, $originalData);

                $payload = [
                    'user_id' => Auth::id(),
                    'action' => $action,
                    'model' => User::class,
                    'model_id' => $user->id,
                    'before' => $original,
                    'after' => $userData,
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ];

                \Illuminate\Support\Facades\Log::info('AuditLog::create payload (user_updated)', array_merge(['source' => 'UserObserver::updated'], $payload));

                AuditLog::create($payload);
            }

            // Clean up the temporary data
            unset(self::$originalAttributes[$user->id]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user update audit', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the User "deleting" event.
     */
    public function deleting(User $user): void
    {
        // Store the current state before deletion, excluding sensitive data
        $userData = $user->toArray();
        unset($userData['password'], $userData['remember_token']);
        self::$deleteData[$user->id] = $userData;
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        try {
            $deletedData = self::$deleteData[$user->id] ?? $user->toArray();

            // If the actor performing the deletion is the same user being deleted,
            // avoid setting user_id to that user because audit_logs.user_id has a
            // restrictive foreign key. Use null in that case to preserve the audit
            // without preventing the deletion.
            $actorId = Auth::id();
            if ($actorId === $user->id) {
                $actorId = null;
            }

            $payload = [
                'user_id' => $actorId,
                'action' => 'user_deleted',
                'model' => User::class,
                'model_id' => $user->id,
                'before' => $deletedData,
                'after' => null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ];

            \Illuminate\Support\Facades\Log::info('AuditLog::create payload (user_deleted)', array_merge(['source' => 'UserObserver::deleted'], $payload));

            AuditLog::create($payload);

            // Clean up the temporary data
            unset(self::$deleteData[$user->id]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user deletion audit', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        try {
            $userData = $user->toArray();
            unset($userData['password'], $userData['remember_token']);

            $payload = [
                'user_id' => Auth::id(),
                'action' => 'user_restored',
                'model' => User::class,
                'model_id' => $user->id,
                'before' => null,
                'after' => $userData,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ];

            \Illuminate\Support\Facades\Log::info('AuditLog::create payload (user_restored)', array_merge(['source' => 'UserObserver::restored'], $payload));

            AuditLog::create($payload);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user restoration audit', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Determine the specific action based on what was updated.
     *
     * @param  array<string, mixed>  $original
     */
    private function determineUpdateAction(User $user, array $original): string
    {
        // Check for password changes
        if ($user->wasChanged('password')) {
            return 'password_changed';
        }

        // Check for email changes
        if ($user->wasChanged('email')) {
            return 'email_changed';
        }

        // Check for scope changes (negeri/cooperative)
        if ($user->wasChanged(['negeri', 'cooperative_id'])) {
            return 'scope_changed';
        }

        // Check for email verification
        if ($user->wasChanged('email_verified_at')) {
            return 'email_verified';
        }

        return 'user_updated';
    }

    /**
     * Log role assignment changes.
     * This should be called manually when roles are assigned/removed.
     *
     * @param  array<string>  $oldRoles
     * @param  array<string>  $newRoles
     */
    public static function logRoleChange(User $user, array $oldRoles, array $newRoles): void
    {
        try {
            $addedRoles = array_diff($newRoles, $oldRoles);
            $removedRoles = array_diff($oldRoles, $newRoles);

            if (! empty($addedRoles) || ! empty($removedRoles)) {
                AuditLog::create([
                    'user_id' => Auth::id(),
                    'action' => 'roles_changed',
                    'model' => User::class,
                    'model_id' => $user->id,
                    'before' => ['roles' => $oldRoles],
                    'after' => [
                        'roles' => $newRoles,
                        'added_roles' => array_values($addedRoles),
                        'removed_roles' => array_values($removedRoles),
                    ],
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user role change audit', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log password reset events.
     * This should be called when password is reset by admin or user.
     */
    public static function logPasswordReset(User $user, bool $isAdminReset = false): void
    {
        try {
            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => $isAdminReset ? 'password_reset_by_admin' : 'password_reset_by_user',
                'model' => User::class,
                'model_id' => $user->id,
                'before' => null,
                'after' => [
                    'reset_type' => $isAdminReset ? 'admin_initiated' : 'user_initiated',
                    'target_user_email' => $user->email,
                    'reset_by_user_id' => Auth::id(),
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log password reset audit', [
                'user_id' => $user->id,
                'is_admin_reset' => $isAdminReset,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log user login events.
     * This should be called during authentication.
     */
    public static function logLogin(User $user, bool $successful = true): void
    {
        try {
            AuditLog::create([
                'user_id' => $successful ? $user->id : null,
                'action' => $successful ? 'user_login_success' : 'user_login_failed',
                'model' => User::class,
                'model_id' => $user->id,
                'before' => null,
                'after' => [
                    'login_attempt' => [
                        'email' => $user->email,
                        'successful' => $successful,
                        'user_roles' => $successful ? $user->getRoleNames()->toArray() : [],
                    ],
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user login audit', [
                'user_id' => $user->id,
                'successful' => $successful,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Log user logout events.
     */
    public static function logLogout(User $user): void
    {
        try {
            AuditLog::create([
                'user_id' => $user->id,
                'action' => 'user_logout',
                'model' => User::class,
                'model_id' => $user->id,
                'before' => null,
                'after' => [
                    'logout_info' => [
                        'email' => $user->email,
                        'user_roles' => $user->getRoleNames()->toArray(),
                    ],
                ],
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to log user logout audit', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
