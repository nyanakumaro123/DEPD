<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UmkmApplicationController extends Controller
{
    public function index()
    {
        $apps = Application::with(['pelamar', 'project'])
            ->whereHas('project', function ($q) {
                $q->where('umkm_id', Auth::id()); // ✅ FIX
            })
            ->get()
            ->groupBy('status');

        return view('Umkm.request-umkm', compact('apps'));
    }

    public function accept(Application $application)
    {
        $application->update(['status' => 'accepted']);
        return back()->with('success', 'Lamaran diterima');
    }

    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);
        return back()->with('success', 'Lamaran ditolak');
    }
}
