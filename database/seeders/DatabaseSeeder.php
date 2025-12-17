<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Untuk panggil seluruh seed
        $this->call([
            UserSeeder::class,
            MajorSeeder::class,
            PelamarProfileSeeder::class,
            UMKMProfileSeeder::class,
            RatingSeeder::class,
        ]);
    }
}
