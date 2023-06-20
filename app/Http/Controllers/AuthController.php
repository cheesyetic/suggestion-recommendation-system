<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login()
    {
        return view('login');
    }

    public function show_register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'nip' => $request->input('nip'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        $nip = $request->input('nip');
        $user = User::where('nip', $nip)->first();

        if (!$user) {
            return redirect()->back()->with('errors', 'Maaf, NIP anda salah.');
        }

        Auth::login($user);

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else return redirect()->intended('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show.login');
    }
}
