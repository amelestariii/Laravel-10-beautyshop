<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Constructor untuk mengatur middleware auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan profil pengguna
    public function show_profile()
    {
        // Mendapatkan informasi pengguna yang sedang login
        $user = Auth::user();
        // Menampilkan halaman profil dengan data pengguna
        return view('show_profile', compact('user'));
    }

    // Mengedit profil pengguna
    public function edit_profile(Request $request)
    {
        // Validasi input dari form
        $request->validate([
        'name' => 'required',
        'password' => 'required|min:8|confirmed'
        ]);

         // Mendapatkan informasi pengguna yang sedang login
        $user = Auth::user();

        // Memperbarui data pengguna di database
        $user->update([
        'name' => $request->name,
        'password' => Hash::make($request->password)
        ]);

         // Redirect kembali ke halaman sebelumnya
        return Redirect::back();
    }
}

