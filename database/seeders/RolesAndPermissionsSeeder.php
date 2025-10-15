<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
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

        // Create permissions
        $permissions = [
            'import-data',
            'generate-reports',
            'view-homestays',
            'manage-homestays',
            'view-performances',
            'manage-performances',
        ];

        if (DB::getSchemaBuilder()->hasTable('permissions')) {
            foreach ($permissions as $permissionName) {
                Permission::findOrCreate($permissionName, 'web');
            }

            // Assign permissions to Admin role
            $adminRole = Role::findByName('Admin', 'web');
            $adminRole->syncPermissions($permissions);

            // Assign limited permissions to other roles
            $penganalisRole = Role::findByName('Penganalisis', 'web');
            $penganalisRole->syncPermissions(['generate-reports', 'view-homestays', 'view-performances']);

            $pemerhatiRole = Role::findByName('Pemerhati', 'web');
            $pemerhatiRole->syncPermissions(['generate-reports', 'view-homestays', 'view-performances']);
        }
    }
}
