<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// controller untuk login dan logout
class AuthenticationController extends Controller
{
    // Controller untuk menampilkan halaman login
    public function index()
    {
        // menampilkan halaman index yang ada di file
        // resource->views->authentication->index.blade.php
        return view('authentication.index');
    }

    // function untuk melakukan login
    public function authentication(Request $request)
    {
        // validasi inputan dari user
        $request->validate([
            'username' => 'required|max:20',
            'password' => 'min:3|max:50|required'
        ]);

        // mengecek apakah username dan password sesuai untuk login admin kalau tidak ada akan di cari login sebagai pelanggan
        if (Auth::guard('useradmin')->attempt($request->only('username', 'password'))) {
            // Menyimpan session login
            $request->session()->regenerate();

            // diarahkan ke route dashboard
            return redirect()->intended('dashboard');
        } elseif (Auth::guard('pelanggan')->attempt($request->only('username', 'password'))) {
            // untuk mengecek username dan password untuk login pelanggan

            // Menyimpan session login
            $request->session()->regenerate();

            // diarahkan ke route dashboard
            return redirect()->intended('dashboard');
        } else {
            // kembalikan error username dan password salah kalau tidak terpenuhi kondisi di atas
            return back()->with('error', 'Username/password anda salah');
        }
    }

    // function logout
    public function logout(Request $request)
    {
        // Menghapus session login
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // mengarahkan ke route "/" atau authentication
        return redirect('/');
    }
}
