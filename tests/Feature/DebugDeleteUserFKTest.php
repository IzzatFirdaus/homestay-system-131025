<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserCleanupService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DebugDeleteUserFKTest extends TestCase
{
    /** @test */
    public function debug_user_deletion_and_foreign_key_checks()
    {
        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite.database', ':memory:');

        Artisan::call('migrate', ['--force' => true]);

        $user = User::factory()->create();

        $cleanup = new UserCleanupService();
        $cleanup->cleanupUserData($user);

        try {
            $user->delete();
            fwrite(STDOUT, "User deleted successfully\n");
        } catch (\Exception $e) {
            fwrite(STDOUT, "Delete failed: " . $e->getMessage() . "\n");

            // Show sqlite foreign key check results
            $fkChecks = DB::select('PRAGMA foreign_key_check;');
            fwrite(STDOUT, "PRAGMA foreign_key_check: " . print_r($fkChecks, true) . PHP_EOL);
            $this->fail('Deletion failed with FK constraint: ' . $e->getMessage());
        }

        $this->assertTrue(true);
    }
}
