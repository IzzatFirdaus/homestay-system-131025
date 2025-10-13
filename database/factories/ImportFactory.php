<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Import;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Import>
 */
class ImportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Import::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $types = ['homestays', 'performances', 'cooperatives', 'clusters'];
        $statuses = ['queued', 'processing', 'completed', 'failed'];

        /** @var string $type */
        $type = $this->faker->randomElement($types);
        /** @var string $status */
        $status = $this->faker->randomElement($statuses);

        $rowsTotal = $this->faker->numberBetween(50, 5000);
        $rowsProcessed = $this->faker->numberBetween(0, $rowsTotal);
        $rowsSuccess = $this->faker->numberBetween(0, $rowsProcessed);
        $rowsFailed = $rowsProcessed - $rowsSuccess;

        return [
            'user_id' => User::factory(),
            'type' => $type,
            'filename' => $type.'_import_'.$this->faker->date().'.xlsx',
            'status' => $status,
            'rows_total' => $rowsTotal,
            'rows_processed' => $rowsProcessed,
            'rows_success' => $rowsSuccess,
            'rows_failed' => $rowsFailed,
            'meta' => $this->generateMeta($type),
        ];
    }

    /**
     * @return array<string,mixed>
     */
    private function generateMeta(string $type): array
    {
        return [
            'original_filename' => $type.'_data.xlsx',
            'file_size' => $this->faker->numberBetween(1024, 10485760), // 1KB to 10MB
            'columns_mapped' => $this->getColumnsForType($type),
            'validation_errors' => [],
        ];
    }

    /**
     * @return list<string>
     */
    private function getColumnsForType(string $type): array
    {
        return match ($type) {
            'homestays' => ['nama', 'negeri', 'alamat', 'kapasiti', 'model_pengurusan'],
            'performances' => ['homestay_nama', 'bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan'],
            'cooperatives' => ['nama', 'negeri', 'alamat'],
            'clusters' => ['nama', 'negeri', 'keterangan'],
            default => ['nama'],
        };
    }

    public function completed(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'status' => 'completed',
                'rows_processed' => $attributes['rows_total'],
                'rows_success' => $attributes['rows_total'],
                'rows_failed' => 0,
            ];
        });
    }

    public function failed(): static
    {
        return $this->state(function (array $attributes): array {
            /** @var array<string,mixed> $meta */
            $meta = $attributes['meta'] ?? [];
            $rowsTotalValue = $attributes['rows_total'] ?? 0;
            $rowsTotal = is_numeric($rowsTotalValue) ? (int) $rowsTotalValue : 0;

            return [
                'status' => 'failed',
                'rows_processed' => $this->faker->numberBetween(0, $rowsTotal),
                'meta' => array_merge($meta, [
                    'error_message' => 'Import failed due to validation errors',
                    'validation_errors' => [
                        ['row' => 5, 'field' => 'nama', 'message' => 'Name is required'],
                        ['row' => 12, 'field' => 'negeri', 'message' => 'Invalid state name'],
                    ],
                ]),
            ];
        });
    }

    public function processing(): static
    {
        return $this->state(function (array $attributes): array {
            $rowsTotalValue = $attributes['rows_total'] ?? 0;
            $total = is_numeric($rowsTotalValue) ? (int) $rowsTotalValue : 0;

            return [
                'status' => 'processing',
                'rows_processed' => $this->faker->numberBetween(1, max(1, $total - 1)),
            ];
        });
    }
}
