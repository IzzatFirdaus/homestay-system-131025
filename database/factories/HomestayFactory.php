<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cluster;
use App\Models\Cooperative;
use App\Models\Homestay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Homestay>
 */
class HomestayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Homestay::class;

    /**
     * Define the model's default state.
     *
     * @return array<string,mixed>
     */
    public function definition(): array
    {
        $negeriList = [
            'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan',
            'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah',
            'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya',
        ];

        $fasilitiList = [
            'WiFi, Air Conditioner, Parking',
            'WiFi, Hot Water, Garden View',
            'Air Conditioner, Private Bathroom, Kitchen',
            'WiFi, Swimming Pool, BBQ Area',
            'Hot Water, Garden, Bicycle Rental',
            'Air Conditioner, WiFi, Traditional Decor',
            'Private Bathroom, Kitchen, Laundry',
            'WiFi, Mountain View, Hiking Trails',
            'Air Conditioner, Sea View, Beach Access',
            'Hot Water, Cultural Activities, Local Guide',
        ];

        return [
            'nama' => $this->faker->company().' Homestay',
            'negeri' => $this->faker->randomElement($negeriList),
            'alamat' => $this->faker->streetAddress().', '.$this->faker->city(),
            'kapasiti' => $this->faker->numberBetween(8, 50),
            'fasiliti' => $this->faker->randomElement($fasilitiList),
            'model_pengurusan' => $this->faker->randomElement(['koperasi', 'individu']),
            'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }

    /**
     * Indicate that the homestay is managed by a cooperative.
     */
    public function koperasi(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'model_pengurusan' => 'koperasi',
                'id_koperasi' => Cooperative::factory(),
            ];
        });
    }

    /**
     * Indicate that the homestay is individually managed.
     */
    public function individu(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'model_pengurusan' => 'individu',
                'id_koperasi' => null,
            ];
        });
    }

    /**
     * Indicate that the homestay is active.
     */
    public function active(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'status' => 'Aktif',
            ];
        });
    }

    /**
     * Indicate that the homestay is inactive.
     */
    public function inactive(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'status' => 'Tidak Aktif',
            ];
        });
    }

    /**
     * Indicate that the homestay belongs to a cluster.
     */
    public function withCluster(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'cluster_id' => Cluster::factory(),
            ];
        });
    }

    /**
     * Create homestay for specific negeri.
     */
    public function forNegeri(string $negeri): static
    {
        return $this->state(function (array $attributes) use ($negeri): array {
            return [
                'negeri' => $negeri,
            ];
        });
    }

    /**
     * Create eco-tourism themed homestay.
     */
    public function ecoTourism(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'nama' => $this->faker->randomElement([
                    'Green Valley Homestay',
                    'Eco Paradise Homestay',
                    'Nature Retreat Homestay',
                    'Rainforest Sanctuary Homestay',
                    'Organic Farm Homestay',
                ]),
                'fasiliti' => 'WiFi, Organic Garden, Nature Trails, Bird Watching, Solar Power',
                'kapasiti' => $this->faker->numberBetween(8, 20),
            ];
        });
    }

    /**
     * Create cultural heritage themed homestay.
     */
    public function culturalHeritage(): static
    {
        return $this->state(function (array $attributes): array {
            return [
                'nama' => $this->faker->randomElement([
                    'Traditional Village Homestay',
                    'Heritage House Homestay',
                    'Cultural Experience Homestay',
                    'Kampung Warisan Homestay',
                    'Authentic Malay Homestay',
                ]),
                'fasiliti' => 'Traditional Architecture, Cultural Activities, Local Cuisine, Handicraft Workshop',
                'kapasiti' => $this->faker->numberBetween(10, 30),
            ];
        });
    }

    /**
     * Configure model after making.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (Homestay $homestay): void {
            // Ensure cooperative consistency
            if ($homestay->model_pengurusan === 'koperasi' && ! $homestay->id_koperasi) {
                $homestay->id_koperasi = Cooperative::factory()->create()->id;
            } elseif ($homestay->model_pengurusan === 'individu') {
                $homestay->id_koperasi = null;
            }
        });
    }
}
