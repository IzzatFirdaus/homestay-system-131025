<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SystemSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SystemSetting>
 */
class SystemSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SystemSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        $settingTypes = [
            'app.name' => 'Sistem Homestay Malaysia',
            'app.timezone' => 'Asia/Kuala_Lumpur',
            'dashboard.refresh_interval' => 300,
            'reports.max_rows' => 10000,
            'import.max_file_size' => 52428800, // 50MB
            'notification.email_enabled' => true,
            'maintenance.mode' => false,
        ];

        $key = (string) $this->faker->randomElement(array_keys($settingTypes));
        $value = $settingTypes[$key];

        return [
            'key' => $key,
            'value' => $value,
            'scope' => $this->faker->optional(0.3)->randomElement([
                'negeri:Selangor',
                'negeri:Johor',
                'koperasi:1',
                'koperasi:2',
            ]) ?? null,
        ];
    }

    public function global(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'scope' => null,
            ];
        });
    }

    public function forNegeri(string $negeri): static
    {
        return $this->state(function (array $attributes) use ($negeri): array {
            return [
                'scope' => "negeri:{$negeri}",
            ];
        });
    }

    public function forKoperasi(int $koperasiId): static
    {
        return $this->state(function (array $attributes) use ($koperasiId): array {
            return [
                'scope' => "koperasi:{$koperasiId}",
            ];
        });
    }

    public function appConfiguration(): static
    {
        return $this->state(function (array $attributes): array {
            $configs = [
                'app.name' => 'Sistem Homestay Malaysia',
                'app.version' => '1.0.0',
                'app.environment' => 'production',
                'app.debug' => false,
            ];

            $key = (string) $this->faker->randomElement(array_keys($configs));

            return [
                'key' => $key,
                'value' => $configs[$key],
                'scope' => null,
            ];
        });
    }

    public function dashboardSettings(): static
    {
        return $this->state(function (array $attributes): array {
            $settings = [
                'dashboard.auto_refresh' => true,
                'dashboard.refresh_interval' => $this->faker->randomElement([60, 300, 600, 1800]),
                'dashboard.show_notifications' => true,
                'dashboard.default_date_range' => $this->faker->randomElement(['7_days', '30_days', '90_days']),
            ];

            $key = (string) $this->faker->randomElement(array_keys($settings));

            return [
                'key' => $key,
                'value' => $settings[$key],
            ];
        });
    }
}
