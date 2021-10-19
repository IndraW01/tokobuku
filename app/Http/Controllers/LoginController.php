<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.index');
    }

    public function store(Request $request)
    {
        $validateLogin = $request->validate([
            'username' => 'required|min:3|max:20',
            'password' => 'required'
        ]);

        if(Auth::attempt($validateLogin)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Anda Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
