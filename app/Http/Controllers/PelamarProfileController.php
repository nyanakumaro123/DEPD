<?php

namespace App\Http\Controllers;

use App\Models\PelamarProfile;
use Illuminate\Support\Facades\Auth;

class PelamarProfileController extends Controller
{
    public function show($userId)
    {
        $profile = PelamarProfile::with(['user', 'major_id'])
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('profile-pelamar', compact('profile'));
    }
}
