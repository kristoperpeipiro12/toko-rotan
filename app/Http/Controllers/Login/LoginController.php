<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email_or_name' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email_or_name)
                ->orWhere('name', $request->email_or_name)
                ->first();

    if ($user && Hash::check($request->password, $user->password)) {

        Auth::login($user);
        $request->session()->regenerate();


        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('toast_success', 'Anda berhasil Login sebagai Admin!');
        }

        return redirect()->route('shop.home')->with('toast_success', 'Anda berhasil Login sebagai Customer!');
    }
    return back()->with('toast_error', 'Email/Nama atau password salah.');
    }

    public function register()
    {
        return view("register");
    }

    public function registerproses(Request $request)
    {

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => 'customer',   
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Arahkan ke halaman verifikasi email
        return redirect('/email/verify');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/')->with('toast_success', 'Anda telah berhasil logout.');
    }
}
