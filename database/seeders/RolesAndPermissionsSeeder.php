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
            'Super Admin',
            'Admin',
            'Penganalisis',
            'Pemerhati',
            'Negeri Admin',
            'Koperasi Admin',
            'Pegawai Negeri',
            'Admin Koperasi',
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
            'create-homestay',
            'update-homestay',
            'delete-homestay',
            'create-import',
            'view-import',
            'delete-import',
            'create-report',
            'view-report',
            'delete-report',
        ];

        if (DB::getSchemaBuilder()->hasTable('permissions')) {
            foreach ($permissions as $permissionName) {
                Permission::findOrCreate($permissionName, 'web');
            }

            // Assign all permissions to Super Admin role
            $superAdminRole = Role::findByName('Super Admin', 'web');
            $superAdminRole->syncPermissions($permissions);

            // Assign all permissions to Admin role
            $adminRole = Role::findByName('Admin', 'web');
            $adminRole->syncPermissions($permissions);

            // Assign limited permissions to other roles
            $penganalisRole = Role::findByName('Penganalisis', 'web');
            $penganalisRole->syncPermissions(['generate-reports', 'view-homestays', 'view-performances', 'create-report', 'view-report']);

            $pemerhatiRole = Role::findByName('Pemerhati', 'web');
            $pemerhatiRole->syncPermissions(['generate-reports', 'view-homestays', 'view-performances', 'view-report']);
        }
    }
}
