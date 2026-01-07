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
            'Branding',
            'Design',
            'Marketing',
            'Content',
            'Development',
            'Photography',
            'Videography',
            'Social Media',
            'Finance',
        ];

        return [
            'umkm_id' => User::where('role', 'umkm')->inRandomOrder()->value('id'),
            'title' => $this->faker->sentence(3),
            'category' => $this->faker->randomElement($categories),
            'description' => $this->faker->paragraph(4),

            'time_start' => '09:00',
            'time_end' => '17:00',

            'salary_amount' => $this->faker->numberBetween(500000, 5000000),
            'salary_frequency' => $this->faker->randomElement([
                'per_hour',
                'per_day',
                'per_week',
                'per_month',
                'total',
            ]),
            'currency' => 'IDR',

            'rewards' => [
                'Sertifikat',
                'Pengalaman kerja',
            ],

            'syarat_path' => null,
        ];
    }
}
