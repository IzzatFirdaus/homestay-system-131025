<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Service to cleanup user-dependent records before account deletion.
 */
final class UserCleanupService
{
    /**
     * Remove or null references that would otherwise prevent deleting the user.
     */
    public function cleanupUserData(User $user): void
    {
        DB::transaction(function () use ($user): void {
            // Delete imports initiated by the user if table exists
            if (Schema::hasTable('imports')) {
                DB::table('imports')->where('user_id', $user->id)->delete();
            }

            // Delete scheduled reports / laporan_terjadual created by the user (if table exists)
            if (Schema::hasTable('laporan_terjadual')) {
                DB::table('laporan_terjadual')->where('user_id', $user->id)->delete();
            }

            // Nullify audit logs' user_id (audit_logs.user_id is nullable) if table exists
            if (Schema::hasTable('audit_logs')) {
                DB::table('audit_logs')->where('user_id', $user->id)->update(['user_id' => null]);
            }

            // Best-effort: remove other possible references (personal_access_tokens are polymorphic; sessions don't block)
        });
    }
}
