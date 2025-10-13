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

        /** @var string $negeri */
        $negeri = $this->faker->randomElement($negeriList);
        /** @var string $cooperativeType */
        $cooperativeType = $this->faker->randomElement($cooperativeTypes);

        return [
            'nama' => $cooperativeType.' '.$negeri.' Sdn Bhd',
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
            /** @var string $defaultNegeri */
            $defaultNegeri = $this->faker->randomElement([
                'Pahang', 'Sabah', 'Sarawak', 'Perak', 'Kelantan',
            ]);
            /** @var string $negeri */
            $negeri = $attributes['negeri'] ?? $defaultNegeri;

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
            /** @var string $defaultNegeri */
            $defaultNegeri = $this->faker->randomElement([
                'Melaka', 'Negeri Sembilan', 'Johor', 'Kelantan', 'Terengganu',
            ]);
            /** @var string $negeri */
            $negeri = $attributes['negeri'] ?? $defaultNegeri;

            return [
                'nama' => 'Koperasi Warisan Budaya '.$negeri.' Sdn Bhd',
                'negeri' => $negeri,
            ];
        });
    }
}
