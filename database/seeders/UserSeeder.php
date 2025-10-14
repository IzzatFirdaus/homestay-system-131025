<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cooperative;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding users...');

        // Create Super Admin
        $superAdmin = User::factory()->create([
            'name' => 'Super Administrator',
            'email' => 'superadmin@motac.gov.my',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'negeri' => null, // Can access all negeri
            'id_koperasi' => null,
        ]);

        // Create National Admin
        $nationalAdmin = User::factory()->create([
            'name' => 'Administrator Kebangsaan',
            'email' => 'admin@motac.gov.my',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'negeri' => null, // Can access all negeri
            'id_koperasi' => null,
        ]);

        // Create Penganalisis (National level)
        $penganalisis = User::factory()->create([
            'name' => 'Penganalisis Kebangsaan',
            'email' => 'penganalisis@motac.gov.my',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'negeri' => null, // Can access all negeri
            'id_koperasi' => null,
        ]);

        // Create Pemerhati (Read-only national)
        $pemerhati = User::factory()->create([
            'name' => 'Pemerhati Sistem',
            'email' => 'pemerhati@motac.gov.my',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'negeri' => null, // Can access all negeri
            'id_koperasi' => null,
        ]);

        // Create Negeri Admins for major states
        $majorNegeri = ['Selangor', 'Johor', 'Pahang', 'Perak', 'Sabah', 'Sarawak'];

        foreach ($majorNegeri as $negeri) {
            User::factory()->create([
                'name' => "Admin {$negeri}",
                'email' => strtolower(str_replace(' ', '', $negeri)).'@gov.my',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'negeri' => $negeri,
                'id_koperasi' => null,
            ]);

            // Create Penganalisis for each major negeri
            User::factory()->create([
                'name' => "Penganalisis {$negeri}",
                'email' => 'penganalisis.'.strtolower(str_replace(' ', '', $negeri)).'@gov.my',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'negeri' => $negeri,
                'id_koperasi' => null,
            ]);
        }

        // Create Koperasi Admins for existing cooperatives
        $cooperatives = Cooperative::take(10)->get(); // Limit to first 10 cooperatives

        foreach ($cooperatives as $cooperative) {
            User::factory()->create([
                'name' => "Admin {$cooperative->nama}",
                'email' => 'admin@'.strtolower(str_replace([' ', '&'], ['', 'and'], $cooperative->nama)).'.coop',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'negeri' => $cooperative->negeri,
                'id_koperasi' => $cooperative->id,
            ]);
        }

        // Create regular users for testing
        User::factory()
            ->count(20)
            ->create();

        // Create some users with specific characteristics

        // Inactive users
        User::factory()
            ->inactive()
            ->count(5)
            ->create();

        // Users with unverified emails
        User::factory()
            ->unverified()
            ->count(3)
            ->create();

        // Test users for different negeri
        $allNegeri = [
            'Selangor', 'Johor', 'Pahang', 'Perak', 'Sabah', 'Sarawak',
            'Kelantan', 'Terengganu', 'Melaka', 'Negeri Sembilan',
            'Pulau Pinang', 'Kedah', 'Perlis', 'Kuala Lumpur', 'Labuan', 'Putrajaya',
        ];

        foreach ($allNegeri as $negeri) {
            // Skip if we already created admin for major negeri
            if (in_array($negeri, $majorNegeri)) {
                continue;
            }

            User::factory()->create([
                'name' => "Pengguna {$negeri}",
                'email' => 'user.'.strtolower(str_replace(' ', '', $negeri)).'@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'negeri' => $negeri,
                'id_koperasi' => null,
            ]);
        }

        $this->command->info('Users seeded successfully.');
        $this->command->info('Default credentials:');
        $this->command->info('- Super Admin: superadmin@motac.gov.my / password123');
        $this->command->info('- National Admin: admin@motac.gov.my / password123');
        $this->command->info('- Penganalisis: penganalisis@motac.gov.my / password123');
        $this->command->info('- Pemerhati: pemerhati@motac.gov.my / password123');
    }
}
