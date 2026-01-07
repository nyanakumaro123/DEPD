<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PelamarProfile;
use App\Models\Major;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PelamarProfileController extends Controller
{
    public function show($userId)
    {
        $profile = PelamarProfile::with(['user', 'major'])
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('Pelamar.profile-pelamar', [
            'profile' => $profile,
            'headerTitle' => $profile->user->name . " Profile",
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        $profile = PelamarProfile::with('major')
            ->where('user_id', $user->id)
            ->firstOrFail();

        $majors = Major::orderBy('name')->get();

        return view('Pelamar.edit-profile-pelamar', compact(
            'profile', 'majors', 'user'
        ));
    }


    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'nullable|exists:majors,id',
            'profile_photo' => 'nullable|image|max:2048',
            'portfolio' => 'nullable|mimes:pdf|max:5120',
        ]);

        $user->update(['name' => $request->name]);

        $user->pelamarProfile->update([
            'major_id' => $request->major_id,
        ]);

        return redirect()
            ->route('profile.pelamar', $user->id)
            ->with('success', 'Profile updated');
    }

}
