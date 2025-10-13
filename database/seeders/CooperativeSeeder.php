<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cooperative;
use Illuminate\Database\Seeder;

class CooperativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding cooperatives...');

        // Create specific cooperatives for each major negeri
        $negeriCooperatives = [
            'Selangor' => [
                'Koperasi Homestay Selangor Sdn Bhd',
                'Koperasi Ekopelancongan Shah Alam Sdn Bhd',
                'Koperasi Pelancongan Kuala Selangor Sdn Bhd',
            ],
            'Johor' => [
                'Koperasi Homestay Johor Sdn Bhd',
                'Koperasi Warisan Budaya Johor Sdn Bhd',
                'Koperasi Pelancongan Johor Bahru Sdn Bhd',
            ],
            'Pahang' => [
                'Koperasi Ekopelancongan Pahang Sdn Bhd',
                'Koperasi Homestay Cameron Highlands Sdn Bhd',
                'Koperasi Pelancongan Kuantan Sdn Bhd',
            ],
            'Perak' => [
                'Koperasi Homestay Perak Sdn Bhd',
                'Koperasi Ekopelancongan Ipoh Sdn Bhd',
                'Koperasi Warisan Budaya Perak Sdn Bhd',
            ],
            'Sabah' => [
                'Koperasi Ekopelancongan Sabah Sdn Bhd',
                'Koperasi Marine Tourism Sabah Sdn Bhd',
                'Koperasi Homestay Kota Kinabalu Sdn Bhd',
            ],
            'Sarawak' => [
                'Koperasi Warisan Budaya Sarawak Sdn Bhd',
                'Koperasi Ekopelancongan Kuching Sdn Bhd',
                'Koperasi Adventure Tourism Sarawak Sdn Bhd',
            ],
        ];

        foreach ($negeriCooperatives as $negeri => $cooperatives) {
            foreach ($cooperatives as $name) {
                Cooperative::factory()->create([
                    'nama' => $name,
                    'negeri' => $negeri,
                    'alamat' => fake()->streetAddress().', '.fake()->city().', '.$negeri,
                ]);
            }
        }

        // Create additional random cooperatives
        Cooperative::factory()->count(10)->create();

        $this->command->info('Cooperatives seeded successfully.');
    }
}
