<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferenceDataSeeder extends Seeder
{
    public function run(): void
    {
        // Seed all Malaysian states and federal territories
        $states = [
            ['id' => 1, 'name' => 'Johor'],
            ['id' => 2, 'name' => 'Kedah'],
            ['id' => 3, 'name' => 'Kelantan'],
            ['id' => 4, 'name' => 'Melaka'],
            ['id' => 5, 'name' => 'Negeri Sembilan'],
            ['id' => 6, 'name' => 'Pahang'],
            ['id' => 7, 'name' => 'Perak'],
            ['id' => 8, 'name' => 'Perlis'],
            ['id' => 9, 'name' => 'Pulau Pinang'],
            ['id' => 10, 'name' => 'Sabah'],
            ['id' => 11, 'name' => 'Sarawak'],
            ['id' => 12, 'name' => 'Selangor'],
            ['id' => 13, 'name' => 'Terengganu'],
            ['id' => 14, 'name' => 'Kuala Lumpur'],
            ['id' => 15, 'name' => 'Labuan'],
            ['id' => 16, 'name' => 'Putrajaya'],
        ];

        // Insert states with upsert to make it idempotent
        foreach ($states as $state) {
            DB::table('states')->updateOrInsert(
                ['id' => $state['id']],
                $state
            );
        }

        // Seed countries from Excel data (comprehensive list including major tourist origin countries)
        $countries = [
            'Argentina', 'Australia', 'Austria', 'Bangladesh', 'Belarus', 'Belgium', 'Brazil', 'Brunei',
            'Cambodia', 'Canada', 'Chile', 'China', 'Czech Republic', 'Denmark', 'Egypt', 'Finland',
            'France', 'Georgia', 'Germany', 'Hong Kong', 'India', 'Indonesia', 'Iran', 'Ireland',
            'Italy', 'Japan', 'Jordan', 'Kazakhstan', 'Laos', 'Malaysia', 'Myanmar', 'Netherlands',
            'New Zealand', 'Norway', 'Pakistan', 'Philippines', 'Poland', 'Portugal', 'Russia',
            'Saudi Arabia', 'Singapore', 'Slovenia', 'South Korea', 'Spain', 'Sri Lanka', 'Sweden',
            'Switzerland', 'Taiwan', 'Thailand', 'Turkey', 'United Kingdom', 'United States',
            'Uzbekistan', 'Vietnam',
        ];

        // Insert countries with idempotent approach
        foreach ($countries as $country) {
            DB::table('countries')->updateOrInsert(
                ['name' => $country],
                ['name' => $country]
            );
        }
    }
}
