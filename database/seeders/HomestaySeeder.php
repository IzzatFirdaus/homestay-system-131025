<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomestaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homestayData = [
            // Kuching Division
            ['id' => 1, 'nama' => 'Homestay Kg. Telok Melano', 'id_koperasi' => 1],
            ['id' => 2, 'nama' => 'Homestay Kg. Telaga Air', 'id_koperasi' => 2],
            ['id' => 3, 'nama' => 'Homestay Kg. Tanah Hitam', 'id_koperasi' => 3],
            ['id' => 4, 'nama' => 'Homestay Kg. Panglima Seman Lama', 'id_koperasi' => 4],
            ['id' => 7, 'nama' => 'Homestay Kg. Buntal', 'id_koperasi' => 7],
            ['id' => 9, 'nama' => 'Homestay Kg. Santubong', 'id_koperasi' => 9],
            ['id' => 10, 'nama' => 'Homestay Kg. Siol Kandis', 'id_koperasi' => 10],
            ['id' => 15, 'nama' => 'Homestay Krokong Bau', 'id_koperasi' => 15],
            ['id' => 16, 'nama' => 'Homestay Kampung Senah Rayang', 'id_koperasi' => 16],
            ['id' => 21, 'nama' => 'Homestay Kampung Bako', 'id_koperasi' => 21],
            ['id' => 26, 'nama' => 'Homestay Singai Bau', 'id_koperasi' => 26],
            ['id' => 29, 'nama' => 'Homestay Kg Pueh', 'id_koperasi' => 29],
            ['id' => 31, 'nama' => 'Homestay Kg. Annah Rais', 'id_koperasi' => 31],
            ['id' => 32, 'nama' => 'Homestay Kg. Benuk', 'id_koperasi' => 32],
            ['id' => 34, 'nama' => 'Homestay Kg. Darul Islam Belimbing', 'id_koperasi' => 34],
            ['id' => 46, 'nama' => 'Homestay Bung Jagoi', 'id_koperasi' => 46],
            ['id' => 49, 'nama' => 'Homestay Kampung Sadir', 'id_koperasi' => 49],
            ['id' => 62, 'nama' => 'Homestay Kpg Assum', 'id_koperasi' => 62],
            ['id' => 65, 'nama' => 'Homestay Kpg Sapit', 'id_koperasi' => 65],

            // Samarahan Division
            ['id' => 18, 'nama' => 'Homestay Kampung Sadong Jaya', 'id_koperasi' => 18],
            ['id' => 47, 'nama' => 'Homestay Sg. Buluh', 'id_koperasi' => 47],
            ['id' => 48, 'nama' => 'Homestay Berambeh', 'id_koperasi' => 48],
            ['id' => 54, 'nama' => 'Homestay Tuba', 'id_koperasi' => 54],

            // Serian Division
            ['id' => 11, 'nama' => 'Homestay Kg. Melayu Tebakang', 'id_koperasi' => 11],
            ['id' => 22, 'nama' => 'Homestay Kampung Pichin', 'id_koperasi' => 22],
            ['id' => 24, 'nama' => 'Homestay Lobang Batu', 'id_koperasi' => 24],
            ['id' => 30, 'nama' => 'Homestay Kg. Mongkos', 'id_koperasi' => 30],
            ['id' => 50, 'nama' => 'Homestay Terbat Mawang', 'id_koperasi' => 50],

            // Sri Aman Division
            ['id' => 41, 'nama' => 'Homestay Rh Wilson Bana', 'id_koperasi' => 41],
            ['id' => 61, 'nama' => 'Homestay Ulu Ai', 'id_koperasi' => 61],

            // Betong Division
            ['id' => 5, 'nama' => 'Homestay Maludam', 'id_koperasi' => 5],
            ['id' => 28, 'nama' => 'Homestay Kampung Pusa', 'id_koperasi' => 28],
            ['id' => 63, 'nama' => 'Homestay Kpg Kabong', 'id_koperasi' => 63],

            // Sarikei Division
            ['id' => 37, 'nama' => 'Homestay Rh Nyuka', 'id_koperasi' => 37],
            ['id' => 43, 'nama' => 'Homestay Rh Margretta', 'id_koperasi' => 43],
            ['id' => 60, 'nama' => 'Homestay Melanau CK', 'id_koperasi' => 60],

            // Sibu Division
            ['id' => 35, 'nama' => 'Homestay Rh Bawang Assan', 'id_koperasi' => 35],
            ['id' => 36, 'nama' => 'Homestay Rh Benjamin Angki', 'id_koperasi' => 36],
            ['id' => 42, 'nama' => 'Homestay Rh Penghulu Philip Kayak', 'id_koperasi' => 42],

            // Mukah Division
            ['id' => 6, 'nama' => 'Homestay Kg. Senau Oya', 'id_koperasi' => 6],
            ['id' => 20, 'nama' => 'Homestay Pedada', 'id_koperasi' => 20],
            ['id' => 64, 'nama' => 'Homestay Kpg Matu Daro', 'id_koperasi' => 64],

            // Kapit Division
            ['id' => 38, 'nama' => 'Homestay Uma Belor', 'id_koperasi' => 38],
            ['id' => 51, 'nama' => 'Homestay Uma Baha', 'id_koperasi' => 51],
            ['id' => 52, 'nama' => 'Homestay Lusong Laku', 'id_koperasi' => 52],
            ['id' => 53, 'nama' => 'Homestay Uma Pawa', 'id_koperasi' => 53],

            // Miri Division
            ['id' => 8, 'nama' => 'Homestay Kedayan', 'id_koperasi' => 8],
            ['id' => 13, 'nama' => 'Homestay Kg. Kuala Sibuti', 'id_koperasi' => 13],
            ['id' => 14, 'nama' => 'Homestay Kg. Sg Narum Marudi', 'id_koperasi' => 14],
            ['id' => 23, 'nama' => 'Homestay Mulu', 'id_koperasi' => 23],
            ['id' => 25, 'nama' => 'Homestay Long Banga', 'id_koperasi' => 25],
            ['id' => 27, 'nama' => 'Homestay Kampung Kedaya Telang Usan', 'id_koperasi' => 27],
            ['id' => 33, 'nama' => 'Homestay Rh Patrick Libau', 'id_koperasi' => 33],
            ['id' => 39, 'nama' => 'Homestay Bario Highlands', 'id_koperasi' => 39],
            ['id' => 40, 'nama' => 'Homestay Sg. Engkala Poyut B', 'id_koperasi' => 40],
            ['id' => 44, 'nama' => 'Homestay Rh Long Iman', 'id_koperasi' => 44],
            ['id' => 55, 'nama' => 'Homestay Long Suling', 'id_koperasi' => 55],
            ['id' => 56, 'nama' => 'Homestay Sli Amy', 'id_koperasi' => 56],
            ['id' => 57, 'nama' => 'Homestay Gua Niah', 'id_koperasi' => 57],
            ['id' => 58, 'nama' => 'Homestay Long Pilah', 'id_koperasi' => 58],
            ['id' => 59, 'nama' => 'Homestay Long Bedian', 'id_koperasi' => 59],

            // Limbang Division
            ['id' => 12, 'nama' => 'Homestay Ba\'kelalan', 'id_koperasi' => 12],
            ['id' => 17, 'nama' => 'Homestay Long Semadoh', 'id_koperasi' => 17],
            ['id' => 19, 'nama' => 'Homestay Kg Kuala Medalam', 'id_koperasi' => 19],
            ['id' => 45, 'nama' => 'Homestay Long Sukang', 'id_koperasi' => 45],
        ];

        // Add negeri field to all homestays (all are in Sarawak)
        foreach ($homestayData as &$homestay) {
            $homestay['negeri'] = 'Sarawak';
        }

        DB::table('homestays')->insert($homestayData);
    }
}
