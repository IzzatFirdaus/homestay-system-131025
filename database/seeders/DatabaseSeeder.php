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
            User::factory()->superAdmin()->create([
                'name' => 'System Administrator',
                'email' => config('dev.national_admin_email'),
                'password' => bcrypt(config('dev.national_admin_password')),
            ]);
        }

        // Create test user for local environment (only if doesn't exist)
        if (app()->environment('local') && ! User::query()->where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt(config('dev.default_user_password')),
            ]);
        }
    }
}
