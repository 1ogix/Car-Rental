<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin account
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Unique identifier
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin'), // Hashed password
                'role' => 'admin', // Role for admin
            ]
        );

        // Staff account
        User::updateOrCreate(
            ['email' => 'staff@example.com'], // Unique identifier
            [
                'name' => 'Staff User',
                'password' => Hash::make('staff'), // Hashed password
                'role' => 'staff', // Role for staff
            ]
        );

        // Regular user account
        User::updateOrCreate(
            ['email' => 'user@example.com'], // Unique identifier
            [
                'name' => 'Regular User',
                'password' => Hash::make('user'), // Hashed password
                'role' => 'user', // Role for regular user
            ]
        );
    }
}
