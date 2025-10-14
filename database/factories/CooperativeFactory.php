<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cooperative;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cooperative>
 */
class CooperativeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Cooperative::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $negeriList = [
            'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan',
            'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah',
            'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya',
        ];

        $cooperativeTypes = [
            'Koperasi Homestay',
            'Koperasi Pelancongan',
            'Koperasi Ekopelancongan',
            'Koperasi Perkhidmatan',
            'Koperasi Komuniti',
        ];

        $negeri = $this->faker->randomElement($negeriList);

        return [
            'nama' => $this->faker->randomElement($cooperativeTypes).' '.$negeri.' Sdn Bhd',
            'negeri' => $negeri,
            'alamat' => $this->faker->streetAddress().', '.$this->faker->city().', '.$negeri,
        ];
    }

    /**
     * Create cooperative for specific negeri.
     */
    public function forNegeri(string $negeri): static
    {
        return $this->state(function (array $attributes) use ($negeri): array {
            return [
                'nama' => 'Koperasi Homestay '.$negeri.' Sdn Bhd',
                'negeri' => $negeri,
                'alamat' => $this->faker->streetAddress().', '.$this->faker->city().', '.$negeri,
            ];
        });
    }

    /**
     * Create eco-tourism focused cooperative.
     */
    public function ecoTourism(): static
    {
        return $this->state(function (array $attributes): array {
            $negeri = $attributes['negeri'] ?? $this->faker->randomElement([
                'Pahang', 'Sabah', 'Sarawak', 'Perak', 'Kelantan',
            ]);

            return [
                'nama' => 'Koperasi Ekopelancongan '.$negeri.' Sdn Bhd',
                'negeri' => $negeri,
            ];
        });
    }

    /**
     * Create cultural heritage focused cooperative.
     */
    public function culturalHeritage(): static
    {
        return $this->state(function (array $attributes): array {
            $negeri = $attributes['negeri'] ?? $this->faker->randomElement([
                'Melaka', 'Negeri Sembilan', 'Johor', 'Kelantan', 'Terengganu',
            ]);

            return [
                'nama' => 'Koperasi Warisan Budaya '.$negeri.' Sdn Bhd',
                'negeri' => $negeri,
            ];
        });
    }
}
