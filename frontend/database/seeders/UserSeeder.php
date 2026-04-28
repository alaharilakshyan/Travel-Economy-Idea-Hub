<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create regular user
        User::updateOrCreate(
            ['email' => 'alahari.lakshyan@gmail.com'],
            [
                'name' => 'Lakshyan Alahari',
                'password' => bcrypt('0123456AlA'),
                'is_admin' => false,
            ]
        );

        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@travelhub.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
            ]
        );

        echo "Users created successfully!\n";
    }
}
