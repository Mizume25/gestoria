<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lumina.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin', 
        ]);

        // Crear Usuario normal
        User::create([
            'name' => 'user_0001',
            'email' => 'user@lumina.com',
            'password' => Hash::make('user1234'),
            'role' => 'user',
        ]);
    }
}