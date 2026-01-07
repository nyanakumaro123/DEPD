<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index(Request $request)
    {
        $majors = Major::all();

        $query = User::where('role', 'pelamar')
            ->with(['pelamarProfile.major']);

        if ($request->filled('major_id')) {
            $query->whereHas('pelamarProfile', function ($q) use ($request) {
                $q->where('major_id', $request->major_id);
            });
        }

        $pelamars = $query->paginate(8);

        return view('umkm.pelamar.index', compact('pelamars','majors'));
    }

    public function show(User $user)
    {
        abort_unless($user->isPelamar(), 404);

        $user->load('pelamarProfile.major');

        return view('umkm.pelamar.show', compact('user'));
    }

}
