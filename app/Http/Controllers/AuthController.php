<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\PelamarProfile;
use App\Models\User;
use App\Models\UmkmProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function destroy()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();


        DB::transaction(function () use ($user) {

            // ===== PELAMAR =====
            if ($user->isPelamar()) {
                $user->applications()->delete();
                $user->pelamarProfile()?->delete();
            }

            // ===== UMKM =====
            if ($user->isUmkm()) {
                // delete projects (and their relations via cascade or manually)
                foreach ($user->projects as $project) {
                    $project->applications()?->delete();
                    $project->delete();
                }

                $user->umkmProfile()?->delete();
            }

            // ===== COMMON =====
            $user->notifications()->delete();

            // finally delete user
            $user->delete();
        });

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Akun berhasil dihapus');
    }

//     <form action="{{ route('account.destroy') }}"
//       method="POST"
//       onsubmit="return confirm('Yakin ingin menghapus akun? Tindakan ini tidak bisa dibatalkan.')">
//     @csrf
//     @method('DELETE')

//     <button class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-3 rounded-lg">
//         Hapus Akun
//     </button>
// </form>


}