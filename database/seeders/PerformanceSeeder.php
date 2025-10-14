<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding sample performance data...');

        // Generate sample performance data for a few homestays from 2023-2024
        $sampleHomestayIds = [1, 2, 3, 4, 5, 7, 8, 9, 10]; // Sample IDs from our seeded data
        $years = [2023, 2024];
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        $performanceData = [];

        foreach ($sampleHomestayIds as $homestayId) {
            foreach ($years as $year) {
                foreach ($months as $month) {
                    // Skip some months randomly (not all homestays have data for all months)
                    if (fake()->boolean(30)) {
                        continue;
                    }

                    // Generate realistic performance data
                    $visitors = fake()->numberBetween(0, 100);
                    $revenue = $visitors * fake()->numberBetween(80, 300); // RM 80-300 per visitor

                    $performanceData[] = [
                        'homestay_id' => $homestayId,
                        'tahun' => $year,
                        'bulan' => $month,
                        'pelawat_domestik' => (int) ($visitors * 0.7), // 70% domestic
                        'pelawat_asing' => (int) ($visitors * 0.3), // 30% international
                        'pendapatan' => $revenue,
                        'sumber_lain' => fake()->numberBetween(0, 1000), // Additional income
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // Insert data in chunks to avoid memory issues
        $chunks = array_chunk($performanceData, 100);
        foreach ($chunks as $chunk) {
            DB::table('performances')->insert($chunk);
        }

        $this->command->info('Sample performance data seeded successfully.');
    }
}
