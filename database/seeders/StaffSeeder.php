<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'staff@example.com'], // Match on the email
            [
                'name' => 'Staff User',
                'password' => Hash::make('staff'), // Properly hash the password
                'role' => 'staff', // Assign staff role
            ]
        );
    }
}
