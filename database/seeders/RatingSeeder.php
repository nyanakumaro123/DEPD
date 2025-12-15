<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\User;
use App\Models\UMKMProfile;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $umkms = UMKMProfile::all();

        foreach ($umkms as $umkm) {

            // // Random number of ratings per UMKM
            // $ratingCount = rand(1, 2);

            // // Pick random users (no duplicates per UMKM)
            // $randomUsers = $users->random(min($ratingCount, $users->count()));

            //foreach ($randomUsers as $user) {
                Rating::create([
                    'user_id' => 1, //$user->id,
                    'umkm_profile_id' => $umkm->id,
                    'score' => rand(3, 5),
                    'review' => fake()->optional()->sentence(10),
                ]);
            //}

            Rating::create([
                'user_id' => 3, //$user->id,
                'umkm_profile_id' => $umkm->id,
                'score' => rand(3, 5),
                'review' => fake()->optional()->sentence(10),
            ]);
        }
    }
}
