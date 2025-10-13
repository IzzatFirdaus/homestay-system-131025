<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\Cooperative;
use App\Models\Homestay;
use Illuminate\Database\Seeder;

class HomestaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding homestays...');

        // Get existing cooperatives and clusters for relationships
        $cooperatives = Cooperative::all();
        $clusters = Cluster::all();

        // Create homestays for each negeri with realistic distribution
        $negeriDistribution = [
            'Selangor' => 15,
            'Johor' => 12,
            'Pahang' => 10,
            'Perak' => 8,
            'Sabah' => 8,
            'Sarawak' => 7,
            'Kelantan' => 6,
            'Terengganu' => 6,
            'Melaka' => 5,
            'Negeri Sembilan' => 5,
            'Pulau Pinang' => 4,
            'Kedah' => 4,
            'Perlis' => 2,
            'Kuala Lumpur' => 3,
            'Labuan' => 2,
            'Putrajaya' => 1,
        ];

        foreach ($negeriDistribution as $negeri => $count) {
            // Get cooperatives for this negeri
            $negeriCooperatives = $cooperatives->where('negeri', $negeri);
            $negeriClusters = $clusters->where('negeri', $negeri);

            for ($i = 1; $i <= $count; $i++) {
                // 70% chance of being managed by cooperative, 30% individual
                $isKoperasi = fake()->boolean(70);

                $homestayData = [
                    'negeri' => $negeri,
                    'model_pengurusan' => $isKoperasi ? 'koperasi' : 'individu',
                    'status' => fake()->randomElement(['Aktif', 'Aktif', 'Aktif', 'Tidak Aktif']), // 75% active
                ];

                if ($isKoperasi && $negeriCooperatives->isNotEmpty()) {
                    $homestayData['id_koperasi'] = $negeriCooperatives->random()->id;
                }

                // 60% chance of being in a cluster
                if (fake()->boolean(60) && $negeriClusters->isNotEmpty()) {
                    $homestayData['cluster_id'] = $negeriClusters->random()->id;
                }

                Homestay::factory()->create($homestayData);
            }
        }

        // Create some themed homestays
        if ($clusters->isNotEmpty()) {
            // Eco-tourism homestays
            $ecoClusters = $clusters->filter(function ($cluster) {
                return str_contains(strtolower($cluster->nama), 'eco');
            });

            if ($ecoClusters->isNotEmpty()) {
                foreach ($ecoClusters->take(3) as $cluster) {
                    Homestay::factory()
                        ->ecoTourism()
                        ->count(fake()->numberBetween(2, 5))
                        ->create([
                            'cluster_id' => $cluster->id,
                            'negeri' => $cluster->negeri,
                            'model_pengurusan' => 'koperasi',
                            'id_koperasi' => $cooperatives->where('negeri', $cluster->negeri)->first()?->id,
                        ]);
                }
            }

            // Cultural heritage homestays
            $culturalClusters = $clusters->filter(function ($cluster) {
                return str_contains(strtolower($cluster->nama), 'budaya') ||
                       str_contains(strtolower($cluster->nama), 'warisan') ||
                       str_contains(strtolower($cluster->nama), 'cultural');
            });

            if ($culturalClusters->isNotEmpty()) {
                foreach ($culturalClusters->take(2) as $cluster) {
                    Homestay::factory()
                        ->culturalHeritage()
                        ->count(fake()->numberBetween(2, 4))
                        ->create([
                            'cluster_id' => $cluster->id,
                            'negeri' => $cluster->negeri,
                            'model_pengurusan' => 'koperasi',
                            'id_koperasi' => $cooperatives->where('negeri', $cluster->negeri)->first()?->id,
                        ]);
                }
            }
        }

        $this->command->info('Homestays seeded successfully.');
    }
}
