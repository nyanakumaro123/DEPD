<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $categories = [
            'Branding','Design','Marketing','Content',
            'Development','Photography','Videography',
            'Social Media','Finance'
        ];

        return [
            'umkm_id' => User::where('role', 'umkm')->inRandomOrder()->first()?->id,
            'title' => $this->faker->jobTitle(),
            'category' => $this->faker->randomElement($categories),
            'employment_type' => $this->faker->randomElement(['Freelance', 'Part Time', 'Full Time']),
            'work_system' => $this->faker->randomElement(['Remote', 'Onsite', 'Hybrid']),
            'working_days' => $this->faker->randomElement(['Senin–Jumat', 'Senin–Sabtu']),
            'time_start' => '08:00',
            'time_end' => '17:00',
            'salary_min' => 1000000,
            'salary_max' => 3000000,
            'currency' => 'IDR',
            'description' => $this->faker->paragraph(4),
            'benefits' => 'Sertifikat, Pengalaman kerja',
            'application_deadline' => now()->addDays(rand(7, 30)),
            'status' => 'open',
        ];
    }
}
