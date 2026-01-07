<?php

namespace Database\Seeders;

use App\Models\UMKMProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UMKMProfileSeeder extends Seeder
{
    public function run(): void
    {
        UMKMProfile::create([
            'user_id' => 8,
            'umkm_name' => 'Toko Maju Jaya',
            'description' => 'Toko Maju Jaya adalah toko retail yang menyediakan berbagai kebutuhan sehari-hari dengan harga terjangkau.',
        ]);

        UMKMProfile::create([
            'user_id' => 9,
            'umkm_name' => 'test',
            'description' => 'test',
        ]);
    }
}