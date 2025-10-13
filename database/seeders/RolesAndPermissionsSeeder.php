<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Baseline roles referenced in tests and policies; permissions will be added in a later phase.
        $roles = [
            'Admin',
            'Penganalisis',
            'Pemerhati',
            'Negeri Admin',
            'Koperasi Admin',
        ];

        if (DB::getSchemaBuilder()->hasTable('roles')) {
            foreach ($roles as $roleName) {
                Role::findOrCreate($roleName, 'web');
            }
        }
    }
}
