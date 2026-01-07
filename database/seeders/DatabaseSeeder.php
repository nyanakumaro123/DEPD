<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\NotificationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(5)->create([
            'role' => 'umkm',
        ]);

        // Untuk panggil seluruh seed
        $this->call([
            UserSeeder::class,
            MajorSeeder::class,
            PelamarProfileSeeder::class,
            UMKMProfileSeeder::class,
            RatingSeeder::class,
            ProjectSeeder::class,
            NotificationSeeder::class,
            ApplicationSeeder::class,
        ]);
    }
}
