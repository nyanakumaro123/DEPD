<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('umkm_id', Auth::id()) // ✅ FIX
            ->get();

        return view('umkm.project.index', compact('projects'));
    }

    public function create()
    {
        return view('umkm.project.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required',
            'category'         => 'required',
            'rewards'          => 'nullable|array',
            'time_start'       => 'required',
            'time_end'         => 'required|after:time_start',
            'salary_amount'    => 'required|numeric',
            'salary_frequency' => 'required',
            'currency'         => 'required',
            'description'      => 'required',
            'syarat_file'      => 'nullable|file|max:5120'
        ]);

        if ($request->hasFile('syarat_file')) {
            $data['syarat_path'] =
                $request->file('syarat_file')->store('syarat', 'public');
        }

        $data['umkm_id'] = Auth::id(); // ✅ FIX

        Project::create($data);

        return redirect()
            ->route('umkm.project.index')
            ->with('success', 'Project berhasil dibuat');
    }
}
