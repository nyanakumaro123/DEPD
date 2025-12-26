<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmProjectController extends Controller
{
    public function create()
    {
        return view('project-umkm');
    }

    public function store(Request $request)
    {
        // 1. Validasi
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'category'         => 'required|array', // Terima sebagai array dulu
            'category.*'       => 'string',
            'time_start'       => 'required',
            'time_end'         => 'required|after:time_start',
            'salary_amount'    => 'required|numeric',
            'salary_frequency' => 'required|in:per_hour,per_day,total',
            'currency'         => 'required|string',
            'description'      => 'required|string',
            'syarat_file'      => 'nullable|file|mimes:pdf,doc,docx,zip|max:5120' // Sesuaikan nama dengan DB
        ]);

        // 2. Convert Array Category ke String (contoh: "Design,Marketing")
        $data['category'] = implode(',', $request->category);

        // 3. Upload File
        if ($request->hasFile('syarat_file')) {
            $data['syarat_path'] = $request->file('syarat_file')->store('syarat', 'public');
        }

        // 4. Set UMKM ID
        $data['umkm_id'] = Auth::id();

        // 5. Simpan
        Project::create($data);

        return redirect()
            ->route('home.umkm')
            ->with('success', 'Project berhasil dibuat');
    }
}