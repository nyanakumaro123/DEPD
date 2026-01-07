<?php

namespace Database\Seeders;

use App\Models\PelamarProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Major;

class PelamarProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major = Major::where('name', 'Visual Communication Design')->first();

        PelamarProfile::create([
            'user_id' => 6,
            'major_id' => $major->id,
            'portfolio' => 'Portfolio_Design_Templatee.pdf',
        ]);

        PelamarProfile::create([
            'user_id' => 8,
            'major_id' => $major->id,
            'portfolio' => 'Portfolio_Design_Templatee.pdf',
        ]);
    }
}

// // Generate PDF content
// //first download by composer require barryvdh/laravel-dompdf
// //also php artisan storage:link to link storage
// $pdf = Pdf::loadHTML('<h1>Hello Ini portofolio saya</h1>');
// $fileName = 'portfolio_user.pdf'; // File name

// Storage::disk('public')->put( // Save PDF to storage
//     'portfolio/' . $fileName,
//     $pdf->output()
// );
// // Generate PDF content