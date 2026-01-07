<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\PelamarProfile;
use App\Models\User;
use App\Models\UmkmProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginPelamar(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role !== 'pelamar') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun ini bukan pelamar'
                ]);
            }

            return redirect()->route('home.pelamar');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function loginUmkm(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role !== 'umkm') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun ini bukan UMKM'
                ]);
            }

            return redirect()->route('home.umkm');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function registerPelamar(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'role'     => 'pelamar',
        ]);

        PelamarProfile::create([
            'user_id' => $user->id,
            'major_id' => Major::where('name', 'Not Specified')->value('id'),
        ]);

        return redirect()->route('login.pelamar')
            ->with('success', 'Registrasi pelamar berhasil');
    }

    public function registerUmkm(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
            'umkm_name' => 'required',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'role'     => 'umkm',
        ]);

        UmkmProfile::create([
            'user_id'   => $user->id,
            'umkm_name' => $data['umkm_name'],
        ]);

        return redirect()->route('login.umkm')
            ->with('success', 'Registrasi UMKM berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
