<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clusters')->insert([
            ['id' => 1, 'nama' => 'Kuching', 'id_negeri' => 11], // Sarawak
            ['id' => 2, 'nama' => 'Samarahan', 'id_negeri' => 11], // Sarawak
            ['id' => 3, 'nama' => 'Serian', 'id_negeri' => 11], // Sarawak
            ['id' => 4, 'nama' => 'Sri Aman', 'id_negeri' => 11], // Sarawak
            ['id' => 5, 'nama' => 'Betong', 'id_negeri' => 11], // Sarawak
            ['id' => 6, 'nama' => 'Sarikei', 'id_negeri' => 11], // Sarawak
            ['id' => 7, 'nama' => 'Sibu', 'id_negeri' => 11], // Sarawak
            ['id' => 8, 'nama' => 'Mukah', 'id_negeri' => 11], // Sarawak
            ['id' => 9, 'nama' => 'Kapit', 'id_negeri' => 11], // Sarawak
            ['id' => 10, 'nama' => 'Miri', 'id_negeri' => 11], // Sarawak
            ['id' => 11, 'nama' => 'Limbang', 'id_negeri' => 11], // Sarawak
        ]);
    }
}
