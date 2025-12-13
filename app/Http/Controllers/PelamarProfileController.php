<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PelamarProfile;
use App\Models\Major;
use App\Models\User;

class PelamarProfileController extends Controller
{
    public function show($userId)
    {
        $profile = PelamarProfile::with(['user', 'major'])
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('profile-pelamar', compact('profile'));
    }

    public function edit($userId)
    {
        // if (Auth::id() != $userId) {
        //     abort(403, 'Unauthorized');
        // }

        $profile = PelamarProfile::with(['user', 'major'])
            ->where('user_id', $userId)
            ->firstOrFail();

        $majors = Major::orderBy('name')->get();

        return view('edit-profile-pelamar', compact('profile', 'majors'));
    }

    public function update(Request $request, $userId)
    {
        // if (Auth::id() != $userId) {
        //     abort(403, 'Unauthorized');
        // }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'nullable|exists:majors,id',
            'portfolio' => 'nullable|file|mimes:pdf|max:2048', // optional PDF upload
        ]);

        $profile = PelamarProfile::where('user_id', $userId)->firstOrFail();
        $user = User::findOrFail($userId);

        // Update user table
        $user->update([
            'name' => $request->name,
            'email' => $request->email, // optional
        ]);

        // Update major_id
        $profile->update(['major_id' => $validated['major_id'] ?? $profile->major_id]);

        // Handle PDF upload (if present)
        if ($request->hasFile('portfolio')) {
            $file = $request->file('portfolio');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/portfolio', $filename);
            
            $profile->update(['portfolio' => $filename]);
        }

        return redirect()->route('profile.pelamar', $userId)
                        ->with('success', 'Profile updated successfully');
    }
}
