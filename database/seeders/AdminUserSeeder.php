<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::firstOrCreate(
            ['email' => 'admin@occultscience.in'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('Admin@1234'),
                'role'     => 'admin',
            ]
        );
    }
}
