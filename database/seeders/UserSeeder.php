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
            'phone' => 1234567890,
            'password' => bcrypt('password'),
            'role' => 'pelamar',
            'profile' => null
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'phone' => 1234567890,
            'password' => bcrypt('testtt'),
            'role' => 'pelamar',
            'profile' => null
        ]);

        // UMKM = true
        User::create([
            'name' => 'Restomie',
            'email' => 'restomie@example.com',
            'phone' => 1234567890,
            'password' => bcrypt('passworda'),
            'role' => 'umkm',
            'profile' => null
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test2@gmail.com',
            'phone' => 1234567890,
            'password' => bcrypt('testtt'),
            'role' => 'umkm',
            'profile' => null
        ]);

        // Dummy Pelamar untuk rating
        User::create([
            'name' => 'Jolteon',
            'email' => 'jolteon@example.com',
            'phone' => 1234567890,
            'password' => bcrypt('passwordz'),
            'role' => 'pelamar',
            'profile' => null
        ]);
    }
}
