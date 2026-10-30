<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Mitra;
use App\Models\Properti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //

    public function login(){
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ], [
            'required' => ':attribute tidak boleh kosong!'
        ]);

        // Maksimal 5 percobaan gagal per menit untuk tiap email dari IP yang sama
        $kunci = Str::lower($request->email).'|'.$request->ip();
        if (RateLimiter::tooManyAttempts($kunci, 5)) {
            return back()->withInput($request->only('email'))
                ->with('error', 'Terlalu banyak percobaan login. Coba lagi dalam '.RateLimiter::availableIn($kunci).' detik.');
        }

        // Satu pesan untuk email maupun password salah, supaya email terdaftar tidak bisa ditebak
        if (! Auth::attempt($request->only('email', 'password'))) {
            RateLimiter::hit($kunci);

            return back()->withInput($request->only('email'))
                ->with('error', 'Email atau password salah');
        }

        RateLimiter::clear($kunci);
        $request->session()->regenerate();

        return redirect()->intended('admin/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard(){
        $agent = Agent::count();
        $properti = Properti::count();
        $mitra = Mitra::count();
        return view('dashboard',compact('mitra','agent','properti'));
    }
}
