<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\User;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $salaryFrequencies = ['per_hour', 'per_day', 'total'];
        $categories = ['Design', 'Development', 'Marketing', 'Research', 'Animation'];

        return [
            'umkm_id' => User::inRandomOrder()->first()->id ?? 1,
            'title' => $this->faker->catchPhrase,
            'category' => $this->faker->randomElement($categories),
            'rewards' => json_encode([
                'bonus' => $this->faker->optional()->numberBetween(50, 500),
                'gift' => $this->faker->optional()->word,
            ]),
            'time_start' => $this->faker->time('H:i:s'),
            'time_end' => $this->faker->time('H:i:s'),
            'salary_amount' => $this->faker->randomFloat(2, 10, 500),
            'salary_frequency' => $this->faker->randomElement($salaryFrequencies),
            'currency' => $this->faker->randomElement(['USD','IDR','EUR']),
            'description' => $this->faker->paragraph(3),
            'syarat_path' => $this->faker->optional()->filePath(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
