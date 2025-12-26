<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PelamarProfile;
use App\Models\Major;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PelamarProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $profile = PelamarProfile::with(['user', 'major'])
            ->firstOrCreate(['user_id' => $userId]);

        return view('profile-pelamar', [
            'profile' => $profile,
            'headerTitle' => Auth::user()->name . " Profile",
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        $userId = Auth::id();
        $profile = PelamarProfile::with(['user', 'major'])
            ->firstOrCreate(['user_id' => $userId]);

        $majors = Major::orderBy('name')->get();

        return view('edit-profile-pelamar', [
            'profile' => $profile,
            'majors' => $majors,
            'headerTitle' => 'Edit Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'nullable|exists:majors,id',
            'profile_photo' => 'nullable|image|max:5120',
            'portfolio' => 'nullable|image|mimes:pdf|max:2048', 
            // Catatan: Portfolio di kumaro mimes pdf, di sini saya set pdf sesuai view
        ]);

        $profile = PelamarProfile::where('user_id', $userId)->firstOrFail();
        $user = User::findOrFail($userId);

        // Update user table
        $user->update([
            'name' => $request->name,
            'email' => $request->email, 
        ]);

        // Update major_id
        $profile->update(['major_id' => $validated['major_id'] ?? $profile->major_id]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            if ($user->profile && Storage::exists('public/profile_pictures/' . $user->profile)) {
                Storage::delete('public/profile_pictures/' . $user->profile);
            }

            $file = $request->file('profile_photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/profile_pictures', $filename);
            
            $user->update(['profile' => $filename]);
        }

        // Handle Portfolio upload
        if ($request->hasFile('portfolio')) {
            if ($profile->portfolio && Storage::exists('public/portfolio/' . $profile->portfolio)) {
                Storage::delete('public/portfolio/' . $profile->portfolio);
            }

            $file = $request->file('portfolio');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/portfolio', $filename);
            
            $profile->update(['portfolio' => $filename]);
        }

        return redirect()->route('profile.pelamar')
                        ->with('success', 'Profile updated successfully');
    }
}