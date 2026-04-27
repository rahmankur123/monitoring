<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {

            // redirect berdasarkan role
            if (auth()->user()->role == 'admin') {
                return redirect('/admin/kegiatan');
            } elseif (auth()->user()->role == 'bendahara') {
                return redirect('/bendahara/kas');
            } elseif (auth()->user()->role == 'takmir') {
                return redirect('/takmir/kegiatan');
            }
        }

        return back()->with('error','Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}