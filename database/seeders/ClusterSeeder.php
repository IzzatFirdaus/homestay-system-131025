<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cluster;
use Illuminate\Database\Seeder;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding clusters...');

        // Create themed clusters for major negeri
        $clusterData = [
            [
                'nama' => 'Kluster Eco-Tourism Pahang',
                'negeri' => 'Pahang',
                'keterangan' => 'Kluster homestay yang memfokuskan kepada pelancongan alam sekitar di Pahang. Menawarkan pengalaman jungle trekking, canopy walk, dan pemeliharaan alam di kawasan hutan hujan tropika.',
            ],
            [
                'nama' => 'Kluster Warisan Budaya Melaka',
                'negeri' => 'Melaka',
                'keterangan' => 'Kluster homestay yang memelihara warisan budaya Melaka. Menawarkan pengalaman budaya Peranakan, aktiviti tradisional, dan kuliner warisan yang autentik.',
            ],
            [
                'nama' => 'Kluster Marine Tourism Sabah',
                'negeri' => 'Sabah',
                'keterangan' => 'Kluster homestay yang menyediakan aktiviti marin di Sabah. Termasuk diving, snorkeling, island hopping, dan pengalaman dengan kehidupan laut yang unik.',
            ],
            [
                'nama' => 'Kluster Adventure Tourism Sarawak',
                'negeri' => 'Sarawak',
                'keterangan' => 'Kluster homestay untuk aktiviti lasak di Sarawak. Menawarkan cave exploration, white water rafting, dan jungle survival experience.',
            ],
            [
                'nama' => 'Kluster Agro Tourism Kelantan',
                'negeri' => 'Kelantan',
                'keterangan' => 'Kluster homestay yang mempromosikan pelancongan pertanian di Kelantan. Pengalaman dalam aktiviti sawah padi, kebun buah-buahan, dan pemprosesan hasil pertanian.',
            ],
            [
                'nama' => 'Kluster Highland Tourism Perak',
                'negeri' => 'Perak',
                'keterangan' => 'Kluster homestay di kawasan tanah tinggi Perak. Menawarkan pengalaman sejuk pergunungan, tea plantation tours, dan aktiviti outdoor di Cameron Highlands.',
            ],
            [
                'nama' => 'Kluster Urban Tourism Selangor',
                'negeri' => 'Selangor',
                'keterangan' => 'Kluster homestay yang memfokuskan kepada pelancongan bandar di Selangor. Kombinasi pengalaman moden dan tradisional dengan akses mudah ke Kuala Lumpur.',
            ],
            [
                'nama' => 'Kluster Cultural Heritage Negeri Sembilan',
                'negeri' => 'Negeri Sembilan',
                'keterangan' => 'Kluster homestay yang memaparkan warisan budaya Minangkabau di Negeri Sembilan. Pengalaman seni bina tradisional, tarian, dan kuliner Minang.',
            ],
        ];

        foreach ($clusterData as $data) {
            Cluster::factory()->create($data);
        }

        // Create additional themed clusters
        Cluster::factory()->ecoTourism()->count(3)->create();
        Cluster::factory()->culturalHeritage()->count(3)->create();
        Cluster::factory()->adventureTourism()->count(2)->create();
        Cluster::factory()->marineTourism()->count(2)->create();

        $this->command->info('Clusters seeded successfully.');
    }
}
