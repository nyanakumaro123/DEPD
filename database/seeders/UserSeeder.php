<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pelamar = false
        User::create([
            'name' => 'NamaMahasiswa',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => false,
            'profile' => null
        ]);

        // UMKM = true
        User::create([
            'name' => 'Restomie',
            'email' => 'restomie@example.com',
            'password' => bcrypt('passworda'),
            'role' => true,
            'profile' => null
        ]);

        // Dummy Pelamar untuk rating
        User::create([
            'name' => 'Jolteon',
            'email' => 'jolteon@example.com',
            'password' => bcrypt('passwordz'),
            'role' => false,
            'profile' => null
        ]);
    }
}
