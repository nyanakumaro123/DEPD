<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmProjectController extends Controller
{

    public function create()
    {
        $projects = Project::where('umkm_id', Auth::id())
            ->get();
        
        return view('UMKM.create-project', [
            'headerTitle' => 'Buat Project - PathLoka',
            'projects'    => $projects,
            'user'        => Auth::user()
        ]);
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

        $data['umkm_id'] = Auth::id();

        Project::create($data);

        return redirect()
            ->route('home.umkm')
            ->with('success', 'Project berhasil dibuat');
    }
}
