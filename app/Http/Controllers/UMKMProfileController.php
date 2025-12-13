<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UMKMProfileController extends Controller
{
    public function show($userId)
    {
        // $profile = PelamarProfile::with(['user', 'major'])
        //     ->where('user_id', $userId)
        //     ->firstOrFail();

        return view('profile-umkm', [
            // 'profile' => $profile,
            // 'headerTitle' => $profile->user->name . " Profile",
            'user' => User::find($userId)
        ]);
    }

}