<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

use App\Models\User;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil UMKM (user role umkm)
        $umkm = User::where('role', 'umkm')->first();

        if (!$umkm) {
            $this->command->warn('Tidak ada user UMKM, seeder project dilewati.');
            return;
        }

        $projects = [
            [
                'title' => 'Social Media Content Creator',
                'category' => 'Marketing',
                'employment_type' => 'part-time',
                'work_system' => 'remote',
                'working_days' => 'Senin - Jumat',
                'time_start' => '09:00',
                'time_end' => '17:00',
                'salary_amount' => 1500000,
                'salary_min' => 1200000,
                'salary_max' => 2000000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'description' => 'Mengelola konten Instagram & TikTok UMKM, membuat caption dan ide kreatif.',
                'benefits' => 'Sertifikat, pengalaman kerja, fleksibel',
                'application_deadline' => Carbon::now()->addDays(14),
            ],
            [
                'title' => 'UI/UX Designer Website UMKM',
                'category' => 'Design',
                'employment_type' => 'freelance',
                'work_system' => 'remote',
                'working_days' => 'Fleksibel',
                'time_start' => '08:00',
                'time_end' => '20:00',
                'salary_amount' => 3000000,
                'salary_min' => 2500000,
                'salary_max' => 4000000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'description' => 'Mendesain UI/UX website UMKM agar user friendly dan modern.',
                'benefits' => 'Portofolio, sertifikat, bayaran kompetitif',
                'application_deadline' => Carbon::now()->addDays(10),
            ],
            [
                'title' => 'Admin Marketplace (Shopee & Tokopedia)',
                'category' => 'Admin',
                'employment_type' => 'full-time',
                'work_system' => 'onsite',
                'working_days' => 'Senin - Sabtu',
                'time_start' => '08:00',
                'time_end' => '17:00',
                'salary_amount' => 2800000,
                'salary_min' => 2500000,
                'salary_max' => 3200000,
                'salary_frequency' => 'per_month',
                'currency' => 'IDR',
                'description' => 'Mengelola pesanan, chat pelanggan, dan update produk marketplace.',
                'benefits' => 'Gaji tetap, bonus, pengalaman kerja',
                'application_deadline' => Carbon::now()->addDays(21),
            ],
            [
                'title' => 'Fotografer Produk UMKM',
                'category' => 'Creative',
                'employment_type' => 'contract',
                'work_system' => 'onsite',
                'working_days' => 'Sesuai jadwal',
                'time_start' => '10:00',
                'time_end' => '16:00',
                'salary_amount' => 1000000,
                'salary_min' => 800000,
                'salary_max' => 1500000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'description' => 'Foto produk makanan & minuman untuk katalog online.',
                'benefits' => 'Portofolio, sertifikat',
                'application_deadline' => Carbon::now()->addDays(7),
            ],
            [
                'title' => 'Web Developer Laravel',
                'category' => 'IT',
                'employment_type' => 'freelance',
                'work_system' => 'remote',
                'working_days' => 'Fleksibel',
                'time_start' => '09:00',
                'time_end' => '21:00',
                'salary_amount' => 5000000,
                'salary_min' => 4000000,
                'salary_max' => 7000000,
                'salary_frequency' => 'total',
                'currency' => 'IDR',
                'description' => 'Mengembangkan dan maintenance website UMKM berbasis Laravel.',
                'benefits' => 'Bayaran besar, portofolio profesional',
                'application_deadline' => Carbon::now()->addDays(30),
            ],
        ];

        foreach ($projects as $project) {
            Project::create(array_merge($project, [
                'umkm_id' => 7,
            ]));
        }
    }
}

//     --- IGNORE ---
//     public function run()
//     {
//         Project::factory()->count(2)->create();
//     }