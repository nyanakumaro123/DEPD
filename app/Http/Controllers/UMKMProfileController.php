<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UMKMProfile;

class UMKMProfileController extends Controller
{
    public function show($userId)
    {
         $profile = UMKMProfile::with(['user', 'ratings.user',])
        ->withAvg('ratings', 'score')
        ->withCount('ratings')
        ->where('user_id', $userId)
        ->firstOrFail();

        return view('profile-umkm', [
            'profile' => $profile,
            'headerTitle' => $profile->user->name . " Profile",
            'user' => User::find($userId)
        ]);
    }

    public function edit($userId)
    {
        // if (Auth::id() != $userId) {
        //     abort(403, 'Unauthorized');
        // }

        $profile = UMKMProfile::with(['user'])
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('edit-profile-umkm', [
            'profile' => $profile,
            'headerTitle' => 'Edit Profile',
            'user' => User::find($userId)
        ]);
    }

}