<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $umkm = User::where('role', 'umkm')->first();

        if (! $umkm) {
            $this->command->warn('Tidak ada user UMKM, seeder project dilewati.');
            return;
        }

        $projects = [
            [
                'title' => 'Social Media Content Creator',
                'category' => 'Marketing',
                'description' => 'Mengelola konten Instagram & TikTok UMKM.',
                'time_start' => '09:00',
                'time_end' => '17:00',
                'salary_amount' => 1500000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'rewards' => [
                    'Sertifikat',
                    'Portofolio',
                ],
            ],
            [
                'title' => 'UI/UX Designer Website UMKM',
                'category' => 'Design',
                'description' => 'Mendesain UI/UX website agar modern dan user friendly.',
                'time_start' => '08:00',
                'time_end' => '18:00',
                'salary_amount' => 3000000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'rewards' => [
                    'Portofolio',
                    'Bayaran kompetitif',
                ],
            ],
            [
                'title' => 'Fotografer Produk UMKM',
                'category' => 'Photography',
                'description' => 'Foto produk makanan & minuman untuk katalog.',
                'time_start' => '10:00',
                'time_end' => '16:00',
                'salary_amount' => 1000000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'rewards' => [
                    'Sertifikat',
                    'Pengalaman kerja',
                ],
            ],
        ];

        foreach ($projects as $project) {
            Project::create(array_merge($project, [
                'umkm_id' => $umkm->id,
            ]));
        }
    }
}
