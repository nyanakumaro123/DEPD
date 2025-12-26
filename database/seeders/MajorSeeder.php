<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [
            'Desain Komunikasi Visual (DKV)',
            'Teknik Informatika',
            'Sistem Informasi',
            'Manajemen Bisnis',
            'Ilmu Komunikasi',
            'Akuntansi',
            'Sastra Inggris',
            'Psikologi'
        ];

        foreach ($majors as $major) {
            Major::firstOrCreate(['name' => $major]);
        }
    }
}