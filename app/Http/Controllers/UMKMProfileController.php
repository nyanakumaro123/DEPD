<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UMKMProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UMKMProfileController extends Controller
{
    public function show($userId)
    {
         $profile = UMKMProfile::with(['user', 'ratings.user'])
        ->withAvg('ratings', 'score')
        ->withCount('ratings')
        ->where('user_id', $userId)
        ->firstOrFail();

        return view('Umkm.profile-umkm', [
            'profile' => $profile,
            'headerTitle' => $profile->user->name . " Profile",
            'user' => User::find($userId)
        ]);
    }

    public function edit($userId)
    {
        if (Auth::id() != $userId) {
            abort(403, 'Unauthorized');
        }

        $profile = UMKMProfile::with(['user'])
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('Umkm.edit-profile-umkm', [
            'profile' => $profile,
            'headerTitle' => 'Edit Profile',
            'user' => User::find($userId)
        ]);
    }

    public function update(Request $request, $userId)
    {
        if (Auth::id() != $userId) {
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'umkm_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = User::findOrFail($userId);
        $profile = UMKMProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'umkm_name' => $request->umkm_name ?? 'NamaUMKM',
                'description' => $request->description ?? '',
            ]
        );


        // Update UMKM data
        $profile->update([
            'umkm_name' => $request->umkm_name,
            'description' => $request->description,
        ]);

        // Upload profile image
        if ($request->hasFile('profile_photo')) {

            // delete old image
            if ($user->profile && Storage::disk('public')->exists('profile_pictures/' . $user->profile)) {
                Storage::disk('public')->delete('profile_pictures/' . $user->profile);
            }

            $file = $request->file('profile_photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_pictures', $filename, 'public');

            $user->update(['profile' => $filename,]);
        }


        return redirect()->route('profile.umkm', $userId)
                        ->with('success', 'Profile updated successfully');
    }
}