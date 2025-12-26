<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UmkmApplicationController extends Controller
{
    public function index()
    {
        // Ambil semua lamaran yang masuk ke proyek milik UMKM ini
        $apps = Application::with(['pelamar.user', 'project'])
            ->whereHas('project', function ($q) {
                $q->where('umkm_id', Auth::id());
            })
            ->latest()
            ->get();

        // Grouping berdasarkan status untuk mempermudah view
        $groupedApps = $apps->groupBy('status');

        return view('request-umkm', [
            'pending' => $groupedApps->get('pending', collect()),
            'accepted' => $groupedApps->get('accepted', collect()),
            'rejected' => $groupedApps->get('rejected', collect()),
        ]);
    }

    public function show($id)
    {
        // Pastikan aplikasi ini milik proyek user yang login
        $application = Application::with(['pelamar.user', 'pelamar.major', 'project'])
            ->whereHas('project', function ($q) {
                $q->where('umkm_id', Auth::id());
            })
            ->findOrFail($id);

        return view('detail-request-umkm', compact('application'));
    }

    public function accept($id)
    {
        $application = Application::findOrFail($id);
        
        // Security check (opsional tapi disarankan)
        if($application->project->umkm_id != Auth::id()) {
            abort(403);
        }

        $application->update(['status' => 'accepted']);
        return redirect()->route('umkm.applications')->with('success', 'Lamaran diterima');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);
        
        // Security check
        if($application->project->umkm_id != Auth::id()) {
            abort(403);
        }

        $application->update(['status' => 'rejected']);
        return redirect()->route('umkm.applications')->with('success', 'Lamaran ditolak');
    }
}