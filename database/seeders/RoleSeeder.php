<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage users', 'manage roles', 'manage shipments', 'manage branches',
            'manage warehouses', 'manage drivers', 'manage vehicles', 'manage tickets',
            'manage settings', 'view dashboard', 'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $admin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());

        $manager = Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'web']);
        $manager->givePermissionTo([
            'manage shipments', 'manage branches', 'manage warehouses',
            'manage drivers', 'manage vehicles', 'manage tickets',
            'view dashboard', 'view reports',
        ]);

        $staff = Role::firstOrCreate(['name' => 'Staff', 'guard_name' => 'web']);
        $staff->givePermissionTo(['manage shipments', 'manage tickets', 'view dashboard']);
    }
}
