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

    public function edit($userId)
    {
        if (Auth::id() != $userId) {
            abort(403, 'Unauthorized');
        }

        $profile = PelamarProfile::with(['user', 'major'])
            ->where('user_id', $userId)
            ->firstOrFail();

        $majors = Major::orderBy('name')->get();

        return view('Pelamar.edit-profile-pelamar', [
            'profile' => $profile,
            'majors' => $majors,
            'headerTitle' => 'Edit Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, $userId)
    {
        if (Auth::id() != $userId) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'nullable|exists:majors,id',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'portfolio' => 'nullable|mimes:pdf|max:5120', // optional PDF upload
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

        // Handle profile photo upload (if present)
        if ($request->hasFile('profile_photo')) {

            if ($user->profile && Storage::exists('public/profile_pictures/' . $user->profile)) {
                Storage::delete('public/profile_pictures/' . $user->profile);
            }

            $file = $request->file('profile_photo');
            $filename = Str::uuid(). '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profile_pictures', $filename); // Save to storage/app/public/profile_pictures
            
            // Update user profile
            $user->update(['profile' => $filename]);
        }


        // Handle PDF upload (if present)
        if ($request->hasFile('portfolio')) {
            // Delete old portfolio if exists
            if ($profile->portfolio && Storage::exists('public/portfolio/' . $profile->portfolio)) {
                Storage::delete('public/portfolio/' . $profile->portfolio);
            }

            $file = $request->file('portfolio');
            if ($file->getMimeType() !== 'application/pdf') {
                abort(422, 'Invalid portfolio file');
            }

            $filename = Str::uuid(). '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/portfolio', $filename);
            
            $profile->update(['portfolio' => $filename]);
        }

        return redirect()->route('profile.pelamar', $userId)
                        ->with('success', 'Profile updated successfully');
    }
}