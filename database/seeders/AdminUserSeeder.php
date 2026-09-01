<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@aetheriancargo.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Hillman120'),
                'is_active' => true,
                'password_change_required' => false,
            ]
        );

        $admin->assignRole('Super Admin');
    }
}
