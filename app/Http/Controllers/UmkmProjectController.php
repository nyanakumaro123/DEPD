<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmProjectController extends Controller
{
    // Fungsi untuk menampilkan form (Handler untuk route 'project.create.umkm')
    public function create()
    {
        // Pastikan view ini ada di resources/views/umkm/project/create.blade.php
        return view('umkm.project.create'); 
    }

    // Fungsi untuk menyimpan data (Handler untuk route 'project.store.umkm')
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'rewards' => 'nullable|array',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
            'salary_amount' => 'required|numeric|min:1000',
            'salary_frequency' => 'required|in:per_hour,per_day,total',
            'currency' => 'required|string|max:10',
            'description' => 'required|string',
            'syarat_file' => 'nullable|file|mimes:pdf,docx,zip|max:5120', // Max 5MB
        ]);

        // 2. Upload File (Jika ada)
        $filePath = null;
        if ($request->hasFile('syarat_file')) {
            // Simpan file di storage/app/public/syarat_proyek
            $filePath = $request->file('syarat_file')->store('syarat_proyek', 'public');
        }

        // 3. Logika Penyimpanan Data ke Database (Model Project)
        // Anda perlu model Project untuk langkah ini:
        /* Project::create([
            'title' => $validatedData['title'],
            // ... field lainnya ...
            'syarat_path' => $filePath, 
            // ...
        ]);
        */

        // 4. Redirect
        return redirect()->route('home.umkm')->with('success', 'Proyek berhasil dibuat dan menunggu persetujuan!');
    }
}