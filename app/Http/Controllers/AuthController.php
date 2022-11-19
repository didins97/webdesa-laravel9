<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login')->withErrors(['errors' => 'email or password wrong!!']);

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
