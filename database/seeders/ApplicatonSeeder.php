<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();
        $pelamars = User::where('role', 'pelamar')->get();

        foreach ($pelamars as $pelamar) {
            foreach ($projects->take(2) as $project) {
                Application::create([
                    'project_id' => $project->id,
                    'pelamar_id' => $pelamar->id,
                    'status' => collect(['pending', 'accepted', 'rejected'])->random(),
                    'source' => 'apply',
                    'notes' => 'Dummy application data',
                ]);
            }
        }
    }
}
