<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DeveloperSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'developer@ravox.id',
            ],
            [
                'name' => 'Developer',
                'password' => Hash::make('Developer123!'),
                'role' => 'developer',
                'is_approved' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}