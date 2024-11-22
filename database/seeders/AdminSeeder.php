<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Match on the email
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin'), // Ensure password is hashed
                'role' => 'admin', // Assign admin role
            ]
        );
    }
}
