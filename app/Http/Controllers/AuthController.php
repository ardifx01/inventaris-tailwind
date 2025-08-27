<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login Form

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // login & autentinkasi

    public function login (Request $request)
    {
        // validasi input
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

        // Cek

        if (Auth::attempt($credentials)){
            $request->session()->regenerate(); // cegah hijack
            return redirect()->intended('/dashboard'); // jika berhasil, bawa ke dashboard
        }

        // Kalau salah

        return back()->withErrors([
            'email' => 'Email atau Password Salah', 
        ])->onlyInput('email'); // email field terisi meski salah, sedangkan password field di bersihkan    


    }

        // Logout

        public function logout (Request $request)
        
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
}
