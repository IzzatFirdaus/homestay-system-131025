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
                ->successful()
                ->count(fake()->numberBetween(2, 5))
                ->create([
                    'created_by' => $user->id,
                ]);
        }

        // Failed imports
        foreach ($users->take(2) as $user) {
            Import::factory()
                ->failed()
                ->count(fake()->numberBetween(1, 3))
                ->create([
                    'created_by' => $user->id,
                ]);
        }

        // Processing imports
        Import::factory()
            ->processing()
            ->count(2)
            ->create([
                'created_by' => $users->first()->id,
            ]);

        // Pending imports
        Import::factory()
            ->pending()
            ->count(1)
            ->create([
                'created_by' => $users->first()->id,
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
                    'created_by' => $user->id,
                ]);
        }

        // Quarterly reports
        LaporanTerjadual::factory()
            ->quarterly()
            ->count(2)
            ->create([
                'created_by' => $users->first()->id,
            ]);

        // Annual reports
        LaporanTerjadual::factory()
            ->annual()
            ->count(1)
            ->create([
                'created_by' => $users->first()->id,
            ]);

        // Custom reports
        LaporanTerjadual::factory()
            ->custom()
            ->count(2)
            ->create([
                'created_by' => $users->random()->id,
            ]);

        // Disabled reports
        LaporanTerjadual::factory()
            ->disabled()
            ->count(1)
            ->create([
                'created_by' => $users->first()->id,
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
                ->loginEvent()
                ->count(fake()->numberBetween(5, 15))
                ->create([
                    'user_id' => $user->id,
                ]);

            // Profile update events
            AuditLog::factory()
                ->profileUpdate()
                ->count(fake()->numberBetween(1, 3))
                ->create([
                    'user_id' => $user->id,
                    'auditable_type' => 'App\Models\User',
                    'auditable_id' => $user->id,
                ]);
        }

        // Data manipulation events
        if ($homestays->isNotEmpty()) {
            foreach ($homestays->take(10) as $homestay) {
                // Homestay creation
                AuditLog::factory()
                    ->dataCreation()
                    ->create([
                        'user_id' => $users->random()->id,
                        'auditable_type' => 'App\Models\Homestay',
                        'auditable_id' => $homestay->id,
                    ]);

                // Random updates
                if (fake()->boolean(30)) {
                    AuditLog::factory()
                        ->dataUpdate()
                        ->create([
                            'user_id' => $users->random()->id,
                            'auditable_type' => 'App\Models\Homestay',
                            'auditable_id' => $homestay->id,
                        ]);
                }
            }
        }

        // System events
        AuditLog::factory()
            ->systemEvent()
            ->count(fake()->numberBetween(10, 20))
            ->create([
                'user_id' => $users->random()->id,
            ]);

        // Import-related events
        $imports = Import::take(5)->get();
        foreach ($imports as $import) {
            AuditLog::factory()
                ->importEvent()
                ->create([
                    'user_id' => $import->created_by,
                    'auditable_type' => 'App\Models\Import',
                    'auditable_id' => $import->id,
                ]);
        }

        // Report generation events
        $reports = LaporanTerjadual::take(3)->get();
        foreach ($reports as $report) {
            AuditLog::factory()
                ->reportEvent()
                ->create([
                    'user_id' => $report->created_by,
                    'auditable_type' => 'App\Models\LaporanTerjadual',
                    'auditable_id' => $report->id,
                ]);
        }

        // Security events
        AuditLog::factory()
            ->securityEvent()
            ->count(fake()->numberBetween(3, 8))
            ->create([
                'user_id' => $users->random()->id,
            ]);

        // Error events
        AuditLog::factory()
            ->errorEvent()
            ->count(fake()->numberBetween(5, 10))
            ->create([
                'user_id' => $users->random()->id,
            ]);
    }
}
