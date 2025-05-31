<?php

namespace Database\Seeders;

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
        // Create a default Dean user
        User::firstOrCreate(
            ['email' => 'dean@example.com'], // Ensures uniqueness
            [
                'name' => 'Dean User',
                'password' => Hash::make('password'), // Change 'password' to a secure default
                'role' => User::ROLE_DEAN,
                'email_verified_at' => now(),
            ]
        );
    }
}