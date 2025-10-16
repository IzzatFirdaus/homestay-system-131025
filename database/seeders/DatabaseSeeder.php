<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed reference data and roles first
        $this->call([
            ReferenceDataSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        // Seed core data in order of dependencies
        if (app()->environment(['local', 'development', 'testing'])) {
            $this->call([
                ClusterSeeder::class,
                CooperativeSeeder::class,
                HomestaySeeder::class,
                PerformanceSeeder::class,
                UserSeeder::class,
                // SystemSettingSeeder::class, // TODO: Update for new schema
                // SampleDataSeeder::class, // TODO: Update for new schema
            ]);
        }

        // Create admin user for production (only if no users exist)
        if (User::query()->count() === 0) {
            $adminEmail = config('dev.national_admin_email');
            $adminPassword = config('dev.national_admin_password');

            User::factory()->superAdmin()->create([
                'name' => 'System Administrator',
                'email' => $adminEmail,
                'password' => bcrypt(is_string($adminPassword) ? $adminPassword : 'password'),
            ]);
        }

        // Create test user for local environment (only if doesn't exist)
        if (app()->environment('local') && ! User::query()->where('email', 'test@example.com')->exists()) {
            $testPassword = config('dev.default_user_password');

            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt(is_string($testPassword) ? $testPassword : 'password'),
            ]);
        }
    }
}
