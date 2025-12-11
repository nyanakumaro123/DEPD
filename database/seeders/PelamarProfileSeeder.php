<?php

namespace Database\Seeders;

use App\Models\PelamarProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelamarProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PelamarProfile::create([
            'user_id' => 1,
            'major' => 'Computer Science',
            'portfolio' => 'portfolio.pdf',
            'certificate' => 'cert.pdf',
        ]);
    }
}
