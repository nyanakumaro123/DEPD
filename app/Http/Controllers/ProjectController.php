<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function detailProjek()
    {
        $projects = Project::all();

        return view('Pelamar.detail-projek-pelamar', [
            'headerTitle' => 'Projects - PathLoka',
            'projects'    => $projects,
            'user'        => Auth::user()
        ]);
    }

    public function applyProjek()
    {
        return view('Pelamar.apply-projek-pelamar', [
            'headerTitle' => 'Detail Projek - PathLoka',
            'user'        => Auth::user()
        ]);
    }

    public function apply(Request $request, $projectId)
    {
        // Logic to handle project application by pelamar
        // You can access the authenticated pelamar using Auth::id()
        
        // For example, you might want to create an application record
        // Application::create([
        //     'pelamar_id' => Auth::id(),
        //     'project_id' => $projectId,
        //     // other fields...
        // ]);

        return redirect()
            ->back()
            ->with('success', 'Anda telah berhasil melamar pada projek ini.');
    }
}