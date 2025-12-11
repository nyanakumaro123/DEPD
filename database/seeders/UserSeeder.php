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
        User::factory()->create([
            'name' => 'NamaMahasiswa',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => false,
            'profile' => 'cat.png'
        ]);

        // UMKM = true
        User::factory()->create([
            'name' => 'Restomie',
            'email' => 'restomie@example.com',
            'password' => bcrypt('passworda'),
            'role' => true,
            'profile' => 'cat.png'
        ]);
    }
}
