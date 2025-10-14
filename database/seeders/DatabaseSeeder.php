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
                // UserSeeder::class, // TODO: Update for new schema
                // SystemSettingSeeder::class, // TODO: Update for new schema
                // SampleDataSeeder::class, // TODO: Update for new schema
            ]);
        }

        // Create admin user for production
        if (! User::query()->where('email', 'admin@motac.gov.my')->exists()) {
            User::factory()->superAdmin()->create([
                'name' => 'System Administrator',
                'email' => 'admin@motac.gov.my',
                'password' => bcrypt('Motac.123$'),
            ]);
        }

        // Create test user for local environment
        if (app()->environment('local') && ! User::query()->where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
    }
}
