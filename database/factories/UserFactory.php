<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cooperative;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $negeriList = [
            'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan',
            'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah',
            'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya',
        ];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'negeri' => $this->faker->optional(0.7)->randomElement($negeriList),
            'cooperative_id' => $this->faker->optional(0.3)->randomElement([null, Cooperative::factory()]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Create a user with admin role scope.
     */
    public function admin(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'name' => 'Admin '.$this->faker->lastName(),
                'negeri' => null, // Admin can access all negeri
                'cooperative_id' => null, // Admin can access all cooperatives
            ];
        });
    }

    /**
     * Create a user with analyst role.
     */
    public function analyst(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'name' => 'Penganalisis '.$this->faker->lastName(),
            ];
        });
    }

    /**
     * Create a user with viewer role.
     */
    public function viewer(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'name' => 'Pemerhati '.$this->faker->lastName(),
            ];
        });
    }

    /**
     * Create a user scoped to specific negeri.
     */
    public function forNegeri(string $negeri): static
    {
        return $this->state(function (array $attributes) use ($negeri): array {
            return [
                'negeri' => $negeri,
                'cooperative_id' => null,
            ];
        });
    }

    /**
     * Create a user scoped to specific cooperative.
     */
    public function forCooperative(int $cooperativeId): static
    {
        return $this->state(function (array $attributes) use ($cooperativeId): array {
            return [
                'cooperative_id' => $cooperativeId,
            ];
        });
    }

    /**
     * Create a super admin user.
     */
    public function superAdmin(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'name' => 'Super Admin',
                'email' => 'superadmin@motac.gov.my',
                'negeri' => null,
                'cooperative_id' => null,
            ];
        });
    }
}
