<?php

namespace Database\Seeders;

use App\Models\UMKMProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UMKMProfileSeeder extends Seeder
{
    public function run(): void
    {
 $umkms = [
            [
                'name' => 'UMKM Kopi Nusantara',
                'email' => 'kopi@umkm.test',
                'umkm_name' => 'Kopi Nusantara',
            ],
            [
                'name' => 'UMKM Digital Kreatif',
                'email' => 'digital@umkm.test',
                'umkm_name' => 'Digital Kreatif',
            ],
        ];

        foreach ($umkms as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'role' => 'umkm',
            ]);

            UmkmProfile::create([
                'user_id' => $user->id,
                'umkm_name' => $data['umkm_name'],
                'description' => 'Deskripsi singkat ' . $data['umkm_name'],
            ]);
    }
}
}
