<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\AuditLog;
use App\Models\Homestay;
use App\Models\Import;
use App\Models\LaporanTerjadual;
use App\Models\User;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding additional sample data...');

        // Sample Import records
        $this->seedImportRecords();

        // Sample Scheduled Reports
        $this->seedScheduledReports();

        // Sample Audit Logs
        $this->seedAuditLogs();

        $this->command->info('Sample data seeded successfully.');
    }

    /**
     * Seed sample import records
     */
    private function seedImportRecords(): void
    {
        $users = User::take(5)->get();

        if ($users->isEmpty()) {
            $this->command->warn('No users found for import records.');

            return;
        }

        // Successful imports
        foreach ($users->take(3) as $user) {
            Import::factory()
                ->completed()
                ->count(fake()->numberBetween(2, 5))
                ->create([
                    'user_id' => $user->id,
                ]);
        }

        // Failed imports
        foreach ($users->take(2) as $user) {
            Import::factory()
                ->failed()
                ->count(fake()->numberBetween(1, 3))
                ->create([
                    'user_id' => $user->id,
                ]);
        }

        // Processing imports
        Import::factory()
            ->processing()
            ->count(2)
            ->create([
                'user_id' => $users->first()->id,
            ]);

        // Pending imports
        Import::factory()
            ->count(1)
            ->create([
                'user_id' => $users->first()->id,
            ]);
    }

    /**
     * Seed sample scheduled reports
     */
    private function seedScheduledReports(): void
    {
        $users = User::take(3)->get();

        if ($users->isEmpty()) {
            $this->command->warn('No users found for scheduled reports.');

            return;
        }

        // Monthly reports for different users
        foreach ($users as $user) {
            LaporanTerjadual::factory()
                ->monthly()
                ->count(fake()->numberBetween(1, 3))
                ->create([
                    'user_id' => $user->id,
                ]);
        }

        // Weekly reports
        LaporanTerjadual::factory()
            ->weekly()
            ->count(2)
            ->create([
                'user_id' => $users->first()->id,
            ]);

        // Daily reports
        LaporanTerjadual::factory()
            ->daily()
            ->count(1)
            ->create([
                'user_id' => $users->first()->id,
            ]);

        // Custom reports (no specific state)
        LaporanTerjadual::factory()
            ->count(2)
            ->create([
                'user_id' => $users->random()->id,
            ]);

        // Disabled reports
        LaporanTerjadual::factory()
            ->inactive()
            ->count(1)
            ->create([
                'user_id' => $users->first()->id,
            ]);
    }

    /**
     * Seed sample audit logs
     */
    private function seedAuditLogs(): void
    {
        $users = User::take(10)->get();
        $homestays = Homestay::take(20)->get();

        if ($users->isEmpty()) {
            $this->command->warn('No users found for audit logs.');

            return;
        }

        // User-related audit logs
        foreach ($users->take(5) as $user) {
            // Login events
            AuditLog::factory()
                ->count(fake()->numberBetween(5, 15))
                ->create([
                    'user_id' => $user->id,
                    'action' => 'login',
                ]);

            // Profile update events
            AuditLog::factory()
                ->updated()
                ->count(fake()->numberBetween(1, 3))
                ->create([
                    'user_id' => $user->id,
                    'model' => 'App\Models\User',
                    'model_id' => $user->id,
                ]);
        }

        // Data manipulation events
        if ($homestays->isNotEmpty()) {
            foreach ($homestays->take(10) as $homestay) {
                // Homestay creation
                AuditLog::factory()
                    ->created()
                    ->create([
                        'user_id' => $users->random()->id,
                        'model' => 'App\Models\Homestay',
                        'model_id' => $homestay->id,
                    ]);

                // Random updates
                if (fake()->boolean(30)) {
                    AuditLog::factory()
                        ->updated()
                        ->create([
                            'user_id' => $users->random()->id,
                            'model' => 'App\Models\Homestay',
                            'model_id' => $homestay->id,
                        ]);
                }
            }
        }

        // System events
        AuditLog::factory()
            ->count(fake()->numberBetween(10, 20))
            ->create([
                'user_id' => $users->random()->id,
                'action' => 'system',
            ]);

        // Import-related events
        $imports = Import::take(5)->get();
        foreach ($imports as $import) {
            AuditLog::factory()
                ->created()
                ->create([
                    'user_id' => $import->user_id,
                    'model' => 'App\Models\Import',
                    'model_id' => $import->id,
                ]);
        }

        // Report generation events
        $reports = LaporanTerjadual::take(3)->get();
        foreach ($reports as $report) {
            AuditLog::factory()
                ->created()
                ->create([
                    'user_id' => $report->user_id,
                    'model' => 'App\Models\LaporanTerjadual',
                    'model_id' => $report->id,
                ]);
        }

        // Security events
        AuditLog::factory()
            ->count(fake()->numberBetween(3, 8))
            ->create([
                'user_id' => $users->random()->id,
                'action' => 'security',
            ]);

        // Error events
        AuditLog::factory()
            ->count(fake()->numberBetween(5, 10))
            ->create([
                'user_id' => $users->random()->id,
                'action' => 'error',
            ]);
    }
}
