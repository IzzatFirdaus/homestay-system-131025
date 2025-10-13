<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Homestay;
use App\Models\Performance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding performance data...');

        $homestays = Homestay::all();

        if ($homestays->isEmpty()) {
            $this->command->warn('No homestays found. Please run HomestaySeeder first.');

            return;
        }

        // Generate performance data for 2020-2025
        $startYear = 2020;
        $endYear = 2025;
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        foreach ($homestays as $homestay) {
            for ($year = $startYear; $year <= $endYear; $year++) {
                $maxMonth = ($year === $currentYear) ? $currentMonth : 12;

                for ($month = 1; $month <= $maxMonth; $month++) {
                    // Skip future months
                    if ($year === $currentYear && $month > $currentMonth) {
                        continue;
                    }

                    // Only 80% chance of having data for any given month
                    if (! fake()->boolean(80)) {
                        continue;
                    }

                    // Seasonal variations based on month
                    $seasonalMultiplier = $this->getSeasonalMultiplier($month);

                    // Different performance patterns based on negeri tourism popularity
                    $negeriMultiplier = $this->getNegeriMultiplier($homestay->negeri);

                    // COVID-19 impact for 2020-2022
                    $covidMultiplier = $this->getCovidMultiplier($year, $month);

                    // Calculate base visitors with variations
                    $baseVisitors = fake()->numberBetween(5, 50);
                    $adjustedVisitors = (int) round(
                        $baseVisitors * $seasonalMultiplier * $negeriMultiplier * $covidMultiplier
                    );

                    // Ensure minimum values
                    $adjustedVisitors = max(0, $adjustedVisitors);

                    // Generate performance data
                    Performance::factory()->create([
                        'homestay_id' => $homestay->id,
                        'tahun' => $year,
                        'bulan' => $month,
                        'pelawat_domestik' => (int) ($adjustedVisitors * fake()->randomFloat(2, 0.7, 0.9)),
                        'pelawat_asing' => (int) ($adjustedVisitors * fake()->randomFloat(2, 0.1, 0.3)),
                        'pendapatan' => $adjustedVisitors * fake()->randomFloat(2, 80, 250),
                        'sumber_lain' => $adjustedVisitors * fake()->randomFloat(2, 20, 150),
                    ]);
                }
            }
        }

        // Create some high-performing examples
        $topHomestays = $homestays->random(5);
        foreach ($topHomestays as $homestay) {
            for ($month = 1; $month <= 6; $month++) {
                Performance::factory()
                    ->highPerformance()
                    ->create([
                        'homestay_id' => $homestay->id,
                        'tahun' => 2024,
                        'bulan' => $month,
                    ]);
            }
        }

        $this->command->info('Performance data seeded successfully.');
    }

    /**
     * Get seasonal multiplier based on month
     */
    private function getSeasonalMultiplier(int $month): float
    {
        // Peak seasons in Malaysia tourism
        $seasonalFactors = [
            1 => 0.9,  // January - New Year
            2 => 0.7,  // February - Low season
            3 => 1.2,  // March - School holidays
            4 => 1.0,  // April - Moderate
            5 => 1.1,  // May - Good weather
            6 => 1.3,  // June - Peak season
            7 => 1.4,  // July - Peak season
            8 => 1.2,  // August - Good season
            9 => 0.8,  // September - Monsoon start
            10 => 0.9, // October - Monsoon
            11 => 1.0, // November - Post monsoon
            12 => 1.3, // December - Year end holidays
        ];

        return $seasonalFactors[$month] ?? 1.0;
    }

    /**
     * Get negeri-based multiplier for tourism popularity
     */
    private function getNegeriMultiplier(string $negeri): float
    {
        $negeriFactors = [
            'Selangor' => 1.2,
            'Kuala Lumpur' => 1.3,
            'Johor' => 1.1,
            'Pulau Pinang' => 1.2,
            'Sabah' => 1.1,
            'Sarawak' => 1.0,
            'Pahang' => 0.9,
            'Perak' => 0.9,
            'Melaka' => 1.1,
            'Kedah' => 0.8,
            'Kelantan' => 0.7,
            'Terengganu' => 0.8,
            'Negeri Sembilan' => 0.8,
            'Perlis' => 0.6,
            'Labuan' => 0.7,
            'Putrajaya' => 0.9,
        ];

        return $negeriFactors[$negeri] ?? 1.0;
    }

    /**
     * Get COVID-19 impact multiplier
     */
    private function getCovidMultiplier(int $year, int $month): float
    {
        // Severe impact in 2020-2021, gradual recovery in 2022-2023
        if ($year === 2020) {
            if ($month >= 3) {
                return 0.2; // Lockdown impact
            }

            return 0.8;
        }

        if ($year === 2021) {
            return 0.3; // Continued restrictions
        }

        if ($year === 2022) {
            return 0.6; // Gradual recovery
        }

        if ($year === 2023) {
            return 0.8; // Better recovery
        }

        // 2024 onwards - normal or better
        return 1.0;
    }
}
