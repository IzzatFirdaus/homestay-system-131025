<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CooperativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cooperatives')->insert([
            // Kuching Division
            ['id' => 1, 'nama' => 'Koperasi Homestay Kg. Telok Melano', 'negeri' => 'Sarawak'],
            ['id' => 2, 'nama' => 'Koperasi Homestay Kg. Telaga Air', 'negeri' => 'Sarawak'],
            ['id' => 3, 'nama' => 'Koperasi Homestay Kg. Tanah Hitam', 'negeri' => 'Sarawak'],
            ['id' => 4, 'nama' => 'Koperasi Homestay Kg. Panglima Seman Lama', 'negeri' => 'Sarawak'],
            ['id' => 7, 'nama' => 'Koperasi Homestay Kg. Buntal', 'negeri' => 'Sarawak'],
            ['id' => 9, 'nama' => 'Koperasi Homestay Kg. Santubong', 'negeri' => 'Sarawak'],
            ['id' => 10, 'nama' => 'Koperasi Homestay Kg. Siol Kandis', 'negeri' => 'Sarawak'],
            ['id' => 15, 'nama' => 'Koperasi Homestay Krokong Bau', 'negeri' => 'Sarawak'],
            ['id' => 16, 'nama' => 'Koperasi Homestay Kampung Senah Rayang', 'negeri' => 'Sarawak'],
            ['id' => 21, 'nama' => 'Koperasi Homestay Kampung Bako', 'negeri' => 'Sarawak'],
            ['id' => 26, 'nama' => 'Koperasi Homestay Singai Bau', 'negeri' => 'Sarawak'],
            ['id' => 29, 'nama' => 'Koperasi Homestay Kg Pueh', 'negeri' => 'Sarawak'],
            ['id' => 31, 'nama' => 'Koperasi Homestay Kg. Annah Rais', 'negeri' => 'Sarawak'],
            ['id' => 32, 'nama' => 'Koperasi Homestay Kg. Benuk', 'negeri' => 'Sarawak'],
            ['id' => 34, 'nama' => 'Koperasi Homestay Kg. Darul Islam Belimbing', 'negeri' => 'Sarawak'],
            ['id' => 46, 'nama' => 'Koperasi Homestay Bung Jagoi', 'negeri' => 'Sarawak'],
            ['id' => 49, 'nama' => 'Koperasi Homestay Kampung Sadir', 'negeri' => 'Sarawak'],
            ['id' => 62, 'nama' => 'Koperasi Homestay Kpg Assum', 'negeri' => 'Sarawak'],
            ['id' => 65, 'nama' => 'Koperasi Homestay Kpg Sapit', 'negeri' => 'Sarawak'],

            // Samarahan Division
            ['id' => 18, 'nama' => 'Koperasi Homestay Kampung Sadong Jaya', 'negeri' => 'Sarawak'],
            ['id' => 47, 'nama' => 'Koperasi Homestay Sg. Buluh', 'negeri' => 'Sarawak'],
            ['id' => 48, 'nama' => 'Koperasi Homestay Berambeh', 'negeri' => 'Sarawak'],
            ['id' => 54, 'nama' => 'Koperasi Homestay Tuba', 'negeri' => 'Sarawak'],

            // Serian Division
            ['id' => 11, 'nama' => 'Koperasi Homestay Kg. Melayu Tebakang', 'negeri' => 'Sarawak'],
            ['id' => 22, 'nama' => 'Koperasi Homestay Kampung Pichin', 'negeri' => 'Sarawak'],
            ['id' => 24, 'nama' => 'Koperasi Homestay Lobang Batu', 'negeri' => 'Sarawak'],
            ['id' => 30, 'nama' => 'Koperasi Homestay Kg. Mongkos', 'negeri' => 'Sarawak'],
            ['id' => 50, 'nama' => 'Koperasi Homestay Terbat Mawang', 'negeri' => 'Sarawak'],

            // Sri Aman Division
            ['id' => 41, 'nama' => 'Koperasi Homestay Rh Wilson Bana', 'negeri' => 'Sarawak'],
            ['id' => 61, 'nama' => 'Koperasi Homestay Ulu Ai', 'negeri' => 'Sarawak'],

            // Betong Division
            ['id' => 5, 'nama' => 'Koperasi Homestay Maludam', 'negeri' => 'Sarawak'],
            ['id' => 28, 'nama' => 'Koperasi Homestay Kampung Pusa', 'negeri' => 'Sarawak'],
            ['id' => 63, 'nama' => 'Koperasi Homestay Kpg Kabong', 'negeri' => 'Sarawak'],

            // Sarikei Division
            ['id' => 37, 'nama' => 'Koperasi Homestay Rh Nyuka', 'negeri' => 'Sarawak'],
            ['id' => 43, 'nama' => 'Koperasi Homestay Rh Margretta', 'negeri' => 'Sarawak'],
            ['id' => 60, 'nama' => 'Koperasi Homestay Melanau CK', 'negeri' => 'Sarawak'],

            // Sibu Division
            ['id' => 35, 'nama' => 'Koperasi Homestay Rh Bawang Assan', 'negeri' => 'Sarawak'],
            ['id' => 36, 'nama' => 'Koperasi Homestay Rh Benjamin Angki', 'negeri' => 'Sarawak'],
            ['id' => 42, 'nama' => 'Koperasi Homestay Rh Penghulu Philip Kayak', 'negeri' => 'Sarawak'],

            // Mukah Division
            ['id' => 6, 'nama' => 'Koperasi Homestay Kg. Senau Oya', 'negeri' => 'Sarawak'],
            ['id' => 20, 'nama' => 'Koperasi Homestay Pedada', 'negeri' => 'Sarawak'],
            ['id' => 64, 'nama' => 'Koperasi Homestay Kpg Matu Daro', 'negeri' => 'Sarawak'],

            // Kapit Division
            ['id' => 38, 'nama' => 'Koperasi Homestay Uma Belor', 'negeri' => 'Sarawak'],
            ['id' => 51, 'nama' => 'Koperasi Homestay Uma Baha', 'negeri' => 'Sarawak'],
            ['id' => 52, 'nama' => 'Koperasi Homestay Lusong Laku', 'negeri' => 'Sarawak'],
            ['id' => 53, 'nama' => 'Koperasi Homestay Uma Pawa', 'negeri' => 'Sarawak'],

            // Miri Division
            ['id' => 8, 'nama' => 'Koperasi Homestay Kedayan', 'negeri' => 'Sarawak'],
            ['id' => 13, 'nama' => 'Koperasi Homestay Kg. Kuala Sibuti', 'negeri' => 'Sarawak'],
            ['id' => 14, 'nama' => 'Koperasi Homestay Kg. Sg Narum Marudi', 'negeri' => 'Sarawak'],
            ['id' => 23, 'nama' => 'Koperasi Homestay Mulu', 'negeri' => 'Sarawak'],
            ['id' => 25, 'nama' => 'Koperasi Homestay Long Banga', 'negeri' => 'Sarawak'],
            ['id' => 27, 'nama' => 'Koperasi Homestay Kampung Kedaya Telang Usan', 'negeri' => 'Sarawak'],
            ['id' => 33, 'nama' => 'Koperasi Homestay Rh Patrick Libau', 'negeri' => 'Sarawak'],
            ['id' => 39, 'nama' => 'Koperasi Homestay Bario Highlands', 'negeri' => 'Sarawak'],
            ['id' => 40, 'nama' => 'Koperasi Homestay Sg. Engkala Poyut B', 'negeri' => 'Sarawak'],
            ['id' => 44, 'nama' => 'Koperasi Homestay Rh Long Iman', 'negeri' => 'Sarawak'],
            ['id' => 55, 'nama' => 'Koperasi Homestay Long Suling', 'negeri' => 'Sarawak'],
            ['id' => 56, 'nama' => 'Koperasi Homestay Sli Amy', 'negeri' => 'Sarawak'],
            ['id' => 57, 'nama' => 'Koperasi Homestay Gua Niah', 'negeri' => 'Sarawak'],
            ['id' => 58, 'nama' => 'Koperasi Homestay Long Pilah', 'negeri' => 'Sarawak'],
            ['id' => 59, 'nama' => 'Koperasi Homestay Long Bedian', 'negeri' => 'Sarawak'],

            // Limbang Division
            ['id' => 12, 'nama' => 'Koperasi Homestay Ba\'kelalan', 'negeri' => 'Sarawak'],
            ['id' => 17, 'nama' => 'Koperasi Homestay Long Semadoh', 'negeri' => 'Sarawak'],
            ['id' => 19, 'nama' => 'Koperasi Homestay Kg Kuala Medalam', 'negeri' => 'Sarawak'],
            ['id' => 45, 'nama' => 'Koperasi Homestay Long Sukang', 'negeri' => 'Sarawak'],
        ]);
    }
}
