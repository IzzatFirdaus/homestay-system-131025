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
     */
    public function definition(): array
    {
        // More comprehensive Malaysian state list with proper casing
        $negeriList = [
            'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan',
            'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah',
            'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 'Labuan', 'Putrajaya',
        ];

        // More authentic Malaysian homestay names
        $homestayPrefixes = [
            'Homestay', 'Desa', 'Kampung', 'Rumah', 'Pondok', 'Chalet',
        ];

        $homestayNames = [
            'Seri Kenangan', 'Warisan Budaya', 'Alam Damai', 'Sinar Harapan', 'Mutiara Kasih',
            'Bunga Raya', 'Cahaya Bintang', 'Indah Permai', 'Seri Wangi', 'Bayu Laut',
            'Rimba Hijau', 'Sungai Jernih', 'Gunung Ledang', 'Tasik Biru', 'Hutan Belantara',
            'Kampung Nelayan', 'Desa Sawah', 'Kebun Durian', 'Ladang Getah', 'Estet Kelapa',
        ];

        // More detailed facilities in English and Malay context
        $fasilitiList = [
            'WiFi, Air Conditioner, Parking, Surau',
            'WiFi, Hot Water, Garden View, Traditional Kitchen',
            'Air Conditioner, Private Bathroom, Halal Kitchen, TV',
            'WiFi, Swimming Pool, BBQ Area, Fishing Spot',
            'Hot Water, Garden, Bicycle Rental, Village Tour',
            'Air Conditioner, WiFi, Traditional Decor, Cultural Activities',
            'Private Bathroom, Halal Kitchen, Laundry, Prayer Room',
            'WiFi, Mountain View, Hiking Trails, Bird Watching',
            'Air Conditioner, Sea View, Beach Access, Boat Rental',
            'Hot Water, Cultural Activities, Local Guide, Handicraft Workshop',
            'WiFi, Farm Experience, Organic Garden, Fruit Picking',
            'Traditional Architecture, Cultural Show, Local Cuisine Cooking Class',
        ];

        $prefix = $this->faker->randomElement($homestayPrefixes);
        $name = $this->faker->randomElement($homestayNames);

        return [
            'nama' => $prefix.' '.$name,
            'negeri' => $this->faker->randomElement($negeriList),
            'alamat' => $this->generateMalaysianAddress(),
            'kapasiti' => $this->faker->numberBetween(8, 50),
            'fasiliti' => $this->faker->randomElement($fasilitiList),
            'model_pengurusan' => $this->faker->randomElement(['koperasi', 'individu']),
            'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }

    /**
     * Generate realistic Malaysian address.
     */
    private function generateMalaysianAddress(): string
    {
        $roads = [
            'Jalan', 'Lorong', 'Lebuh', 'Persiaran', 'Jalan Besar', 'Jalan Raya',
        ];

        $places = [
            'Kampung Baru', 'Taman Indah', 'Bandar Baru', 'Kampung Nelayan',
            'Desa Damai', 'Taman Seri', 'Kampung Melayu', 'Pekan Lama',
            'Bandar Hilir', 'Kawasan Perindustrian', 'Taman Perumahan',
        ];

        $roadNames = [
            'Merdeka', 'Malaysia', 'Bunga Raya', 'Seri Negara', 'Tun Razak',
            'Datuk Keramat', 'Raja Laut', 'Sultan Ibrahim', 'Hang Tuah',
            'Tunku Abdul Rahman', 'Sungai Pinang', 'Bukit Bintang',
        ];

        $houseNumber = $this->faker->numberBetween(1, 999);
        $road = $this->faker->randomElement($roads);
        $roadName = $this->faker->randomElement($roadNames);
        $place = $this->faker->randomElement($places);

        return "{$houseNumber}, {$road} {$roadName}, {$place}";
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

            // If id_koperasi has been explicitly set via state, ensure model_pengurusan is 'koperasi'
            if ($homestay->id_koperasi && $homestay->model_pengurusan !== 'koperasi') {
                $homestay->model_pengurusan = 'koperasi';
            }
        });
    }
}
