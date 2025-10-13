<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferenceDataSeeder extends Seeder
{
    public function run(): void
    {
        // Minimal reference data for states (negeri) to support dropdowns and tests.
        // If a dedicated states table is introduced later, migrate this data accordingly.
        $states = [
            'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang',
            'Pulau Pinang', 'Perak', 'Perlis', 'Selangor', 'Terengganu', 'Sabah', 'Sarawak', 'W.P. Kuala Lumpur', 'W.P. Labuan', 'W.P. Putrajaya',
        ];

        // Seed a couple of clusters as examples if table exists.
        if (DB::getSchemaBuilder()->hasTable('clusters')) {
            $existing = DB::table('clusters')->count();
            if ($existing === 0) {
                DB::table('clusters')->insert([
                    ['nama' => 'Eco-Tourism', 'negeri' => 'Pahang', 'created_at' => now(), 'updated_at' => now()],
                    ['nama' => 'Cultural Heritage', 'negeri' => 'Melaka', 'created_at' => now(), 'updated_at' => now()],
                ]);
            }
        }

        // Store reference list of states in system_settings as JSON for UI dropdowns (until a dedicated table is introduced).
        if (DB::getSchemaBuilder()->hasTable('system_settings')) {
            $key = 'negeri.list';
            $exists = DB::table('system_settings')->where(['key' => $key, 'scope' => 'global'])->exists();
            if (! $exists) {
                DB::table('system_settings')->insert([
                    'key' => $key,
                    'value' => json_encode($states, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    'scope' => 'global',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
