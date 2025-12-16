<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UmkmProfile;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerPelamar(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);

        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
            'role'=>'pelamar'
        ]);

        return redirect()->back()->with('success','Pelamar berhasil register');
    }

    public function registerUmkm(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6',
            'umkm_name'=>'required'
        ]);

        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
            'role'=>'umkm'
        ]);

        UmkmProfile::create([
            'user_id'=>$user->id,
            'umkm_name'=>$data['umkm_name']
        ]);

        return redirect()->back()->with('success','UMKM berhasil register');
    }
}
