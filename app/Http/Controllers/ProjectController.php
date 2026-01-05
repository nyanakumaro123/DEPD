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

    

}