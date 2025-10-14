<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Homestay;
use App\Models\Performance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performance>
 */
class PerformanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Performance::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = $this->faker->numberBetween(2020, 2025);
        $month = $this->faker->numberBetween(1, 12);

        // Realistic visitor numbers based on homestay capacity
        $domesticVisitors = $this->faker->numberBetween(5, 80);
        $foreignVisitors = $this->faker->numberBetween(0, 30);

        // Calculate realistic income based on visitors
        $totalVisitors = $domesticVisitors + $foreignVisitors;
        $avgRatePerNight = $this->faker->numberBetween(80, 250); // RM per person per night
        $avgStayDays = $this->faker->numberBetween(1, 4);
        $income = $totalVisitors * $avgRatePerNight * $avgStayDays;

        // Add some variance to make it more realistic
        $income *= $this->faker->randomFloat(2, 0.7, 1.3);

        // Other income sources (meals, activities, souvenirs)
        $otherIncome = $income * $this->faker->randomFloat(2, 0.1, 0.4);

        return [
            'homestay_id' => Homestay::factory(),
            'bulan' => $month,
            'tahun' => $year,
            'pelawat_domestik' => $domesticVisitors,
            'pelawat_asing' => $foreignVisitors,
            'pendapatan' => round($income, 2),
            'sumber_lain' => round($otherIncome, 2),
        ];
    }

    /**
     * Create performance for specific year.
     */
    public function forYear(int $year): static
    {
        return $this->state(function (array $attributes) use ($year): array {
            return [
                'tahun' => $year,
            ];
        });
    }

    /**
     * Create performance for specific month and year.
     */
    public function forPeriod(int $year, int $month): static
    {
        return $this->state(function (array $attributes) use ($year, $month): array {
            return [
                'tahun' => $year,
                'bulan' => $month,
            ];
        });
    }

    /**
     * Create performance for specific homestay.
     */
    public function forHomestay(int $homestayId): static
    {
        return $this->state(function (array $attributes) use ($homestayId): array {
            return [
                'homestay_id' => $homestayId,
            ];
        });
    }

    /**
     * Create high performance record.
     */
    public function highPerformance(): static
    {
        return $this->state(function (array $attributes): array {
            $domesticVisitors = $this->faker->numberBetween(60, 120);
            $foreignVisitors = $this->faker->numberBetween(20, 60);
            $totalVisitors = $domesticVisitors + $foreignVisitors;

            $income = $totalVisitors * $this->faker->numberBetween(150, 300) * $this->faker->numberBetween(2, 5);
            $otherIncome = $income * $this->faker->randomFloat(2, 0.2, 0.5);

            return [
                'pelawat_domestik' => $domesticVisitors,
                'pelawat_asing' => $foreignVisitors,
                'pendapatan' => round($income, 2),
                'sumber_lain' => round($otherIncome, 2),
            ];
        });
    }

    /**
     * Create low performance record.
     */
    public function lowPerformance(): static
    {
        return $this->state(function (array $attributes): array {
            $domesticVisitors = $this->faker->numberBetween(0, 15);
            $foreignVisitors = $this->faker->numberBetween(0, 5);
            $totalVisitors = $domesticVisitors + $foreignVisitors;

            if ($totalVisitors === 0) {
                return [
                    'pelawat_domestik' => 0,
                    'pelawat_asing' => 0,
                    'pendapatan' => 0,
                    'sumber_lain' => 0,
                ];
            }

            $income = $totalVisitors * $this->faker->numberBetween(50, 120) * $this->faker->numberBetween(1, 2);
            $otherIncome = $income * $this->faker->randomFloat(2, 0.05, 0.2);

            return [
                'pelawat_domestik' => $domesticVisitors,
                'pelawat_asing' => $foreignVisitors,
                'pendapatan' => round($income, 2),
                'sumber_lain' => round($otherIncome, 2),
            ];
        });
    }

    /**
     * Create no visitors/income record.
     */
    public function noActivity(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'pelawat_domestik' => 0,
                'pelawat_asing' => 0,
                'pendapatan' => 0.00,
                'sumber_lain' => 0.00,
            ];
        });
    }

    /**
     * Create seasonal peak performance (high season).
     */
    public function peakSeason(): static
    {
        return $this->state(function (array $attributes): array {
            // Peak months: December, January, June, July
            $peakMonths = [12, 1, 6, 7];

            return [
                'bulan' => $this->faker->randomElement($peakMonths),
            ];
        })->highPerformance();
    }

    /**
     * Create off-season performance (low season).
     */
    public function offSeason(): static
    {
        return $this->state(function (array $attributes): array {
            // Off-season months: February, March, September, October
            $offSeasonMonths = [2, 3, 9, 10];

            return [
                'bulan' => $this->faker->randomElement($offSeasonMonths),
            ];
        })->lowPerformance();
    }

    /**
     * Create foreign visitor focused performance.
     */
    public function foreignVisitorFocused(): static
    {
        return $this->state(function (array $attributes): array {
            $foreignVisitors = $this->faker->numberBetween(30, 80);
            $domesticVisitors = $this->faker->numberBetween(10, 40);
            $totalVisitors = $domesticVisitors + $foreignVisitors;

            // Foreign visitors typically pay more
            $income = $totalVisitors * $this->faker->numberBetween(200, 350) * $this->faker->numberBetween(2, 6);
            $otherIncome = $income * $this->faker->randomFloat(2, 0.3, 0.6);

            return [
                'pelawat_domestik' => $domesticVisitors,
                'pelawat_asing' => $foreignVisitors,
                'pendapatan' => round($income, 2),
                'sumber_lain' => round($otherIncome, 2),
            ];
        });
    }

    /**
     * Create domestic visitor focused performance.
     */
    public function domesticVisitorFocused(): static
    {
        return $this->state(function (array $attributes): array {
            $domesticVisitors = $this->faker->numberBetween(40, 100);
            $foreignVisitors = $this->faker->numberBetween(0, 10);
            $totalVisitors = $domesticVisitors + $foreignVisitors;

            // Domestic visitors typically pay less but stay longer
            $income = $totalVisitors * $this->faker->numberBetween(80, 180) * $this->faker->numberBetween(2, 4);
            $otherIncome = $income * $this->faker->randomFloat(2, 0.15, 0.35);

            return [
                'pelawat_domestik' => $domesticVisitors,
                'pelawat_asing' => $foreignVisitors,
                'pendapatan' => round($income, 2),
                'sumber_lain' => round($otherIncome, 2),
            ];
        });
    }

    /**
     * Create monthly series for a homestay (12 months).
     */
    public function monthlySeries(int $homestayId, int $year): array
    {
        $performances = [];

        for ($month = 1; $month <= 12; $month++) {
            // Vary performance by season
            $factory = $this->forHomestay($homestayId)->forPeriod($year, $month);

            if (in_array($month, [12, 1, 6, 7])) {
                $factory = $factory->highPerformance();
            } elseif (in_array($month, [2, 3, 9, 10])) {
                $factory = $factory->lowPerformance();
            }

            $performances[] = $factory->make()->toArray();
        }

        return $performances;
    }
}
