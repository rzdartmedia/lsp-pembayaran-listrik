<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('authentication.index');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'username' => 'required|max:20',
            'password' => 'min:3|max:50|required'
        ]);

        if (Auth::guard('useradmin')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } elseif (Auth::guard('pelanggan')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } else {
            return back()->with('error', 'Username/password anda salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
