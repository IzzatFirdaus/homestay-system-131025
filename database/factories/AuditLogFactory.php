<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuditLog>
 */
class AuditLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = AuditLog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $actions = ['created', 'updated', 'deleted', 'imported', 'exported', 'login', 'logout'];
        $models = ['App\\Models\\Homestay', 'App\\Models\\Cooperative', 'App\\Models\\Performance', 'App\\Models\\User'];

        /** @var string $action */
        $action = $this->faker->randomElement($actions);
        /** @var string $model */
        $model = $this->faker->randomElement($models);

        return [
            'user_id' => User::factory(),
            'action' => $action,
            'model' => $model,
            'model_id' => $this->faker->numberBetween(1, 1000),
            'before' => $this->generateBeforeData($action, $model),
            'after' => $this->generateAfterData($action, $model),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }

    /**
     * @return array<string,mixed>|null
     */
    private function generateBeforeData(string $action, string $model): ?array
    {
        if ($action === 'created') {
            return null;
        }

        $modelName = class_basename($model);

        return match ($modelName) {
            'Homestay' => [
                'nama' => $this->faker->company() . ' Homestay',
                'status' => 'Aktif',
                'kapasiti' => $this->faker->numberBetween(10, 30),
            ],
            'User' => [
                'name' => $this->faker->name(),
                'email' => $this->faker->email(),
            ],
            default => ['name' => $this->faker->name()],
        };
    }

    /**
     * @return array<string,mixed>|null
     */
    private function generateAfterData(string $action, string $model): ?array
    {
        if ($action === 'deleted') {
            return null;
        }

        $modelName = class_basename($model);

        return match ($modelName) {
            'Homestay' => [
                'nama' => $this->faker->company() . ' Homestay',
                'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
                'kapasiti' => $this->faker->numberBetween(10, 50),
            ],
            'User' => [
                'name' => $this->faker->name(),
                'email' => $this->faker->email(),
            ],
            default => ['name' => $this->faker->name()],
        };
    }

    public function created(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'action' => 'created',
                'before' => null,
            ];
        });
    }

    public function updated(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'action' => 'updated',
            ];
        });
    }

    public function deleted(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'action' => 'deleted',
                'after' => null,
            ];
        });
    }
}
