<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UmkmProfile;
use Illuminate\Support\Facades\Storage;

class UMKMProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // Menggunakan firstOrCreate agar tidak error jika profil belum ada
        $profile = UmkmProfile::with(['user', 'ratings.user'])
        ->withAvg('ratings', 'score')
        ->withCount('ratings')
        ->firstOrCreate(['user_id' => $userId], ['umkm_name' => Auth::user()->name]);

        return view('profile-umkm', [
            'profile' => $profile,
            'headerTitle' => $profile->user->name . " Profile",
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        $userId = Auth::id();
        $profile = UmkmProfile::with(['user'])
            ->firstOrCreate(['user_id' => $userId], ['umkm_name' => Auth::user()->name]);

        return view('edit-profile-umkm', [
            'profile' => $profile,
            'headerTitle' => 'Edit Profile',
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        
        $request->validate([
            'umkm_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = User::findOrFail($userId);
        $profile = UmkmProfile::where('user_id', $userId)->firstOrFail();

        // Update UMKM data
        $profile->update([
            'umkm_name' => $request->umkm_name,
            'description' => $request->description,
        ]);

        // Upload profile image
        if ($request->hasFile('profile_photo')) {
            if ($user->profile && Storage::disk('public')->exists('profile_pictures/' . $user->profile)) {
                Storage::disk('public')->delete('profile_pictures/' . $user->profile);
            }

            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profile_pictures', $filename, 'public');

            $user->update([
                'profile' => $filename,
            ]);
        }

        return redirect()->route('profile.umkm')
                        ->with('success', 'Profile updated successfully');
    }
}