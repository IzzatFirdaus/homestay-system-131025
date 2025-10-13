<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LaporanTerjadual;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaporanTerjadual>
 */
class LaporanTerjadualFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = LaporanTerjadual::class;

    /**
     * Define the model's default state.
     *
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        $reportTypes = [
            'Laporan Prestasi Bulanan',
            'Laporan Pelawat Negeri',
            'Laporan Pendapatan Koperasi',
            'Laporan Analisis Trend',
            'Laporan Eksekutif Dashboard',
        ];

        $frequencies = ['daily', 'weekly', 'monthly'];
        $formats = ['pdf', 'xlsx', 'csv'];

        return [
            'user_id' => User::factory(),
            'nama' => $this->faker->randomElement($reportTypes),
            'format' => $this->faker->randomElement($formats),
            'frekuensi' => $this->faker->randomElement($frequencies),
            'filters' => $this->generateFilters(),
            'recipients' => $this->generateRecipients(),
            'status' => $this->faker->randomElement(['aktif', 'nyahaktif']),
            'last_run_at' => $this->faker->optional()->dateTimeBetween('-30 days', 'now'),
        ];
    }

    /**
     * @return array<string,mixed>
     */
    private function generateFilters(): array
    {
        $filters = [];

        if ($this->faker->boolean(70)) {
            $filters['negeri'] = $this->faker->randomElement([
                'Selangor', 'Johor', 'Pahang', 'Perak', 'Sabah',
            ]);
        }

        if ($this->faker->boolean(30)) {
            $filters['date_range'] = [
                'from' => $this->faker->date(),
                'to' => $this->faker->date(),
            ];
        }

        if ($this->faker->boolean(20)) {
            $filters['model_pengurusan'] = $this->faker->randomElement(['koperasi', 'individu']);
        }

        return $filters;
    }

    /**
     * @return list<string>
     */
    private function generateRecipients(): array
    {
        $count = $this->faker->numberBetween(1, 5);
        $recipients = [];

        for ($i = 0; $i < $count; $i++) {
            $recipients[] = $this->faker->email();
        }

        return array_values(array_unique($recipients));
    }

    public function active(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'status' => 'aktif',
            ];
        });
    }

    public function inactive(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'status' => 'nyahaktif',
            ];
        });
    }

    public function monthly(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'frekuensi' => 'monthly',
                'nama' => 'Laporan Prestasi Bulanan '.$this->faker->monthName(),
            ];
        });
    }

    public function weekly(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'frekuensi' => 'weekly',
                'nama' => 'Laporan Mingguan '.$this->faker->dayOfWeek(),
            ];
        });
    }

    public function daily(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'frekuensi' => 'daily',
                'nama' => 'Laporan Harian Dashboard',
            ];
        });
    }
}
