<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
        'email_or_name' => 'required|string',
        'password' => 'required|string',
    ]);


    $customer = Customer::where('email', $request->email_or_name)
                        ->orWhere('name', $request->email_or_name)
                        ->first();


    if ($customer && Hash::check($request->password, $customer->password)) {

        Auth::login($customer);
        $request->session()->regenerate();


        if ($customer->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('toast_success', 'Anda berhasil Login sebagai Admin!');
        }

        return redirect()->route('shop.home')->with('toast_success', 'Anda berhasil Login!');
    }

    return back()->with('toast_error', 'Email/Nama atau password salah.');
}


    public function register()
    {
        return view("auth.regist");
    }


public function registerproses(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customer,email',
        'password' => 'required|string',
    ]);


    $customer = Customer::create([
        "id_customer" => uniqid(),
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
        "no_hp"=> $request->no_hp,
        "alamat"=> $request->alamat,
        "role" => 'customer',
    ]);


    event(new Registered($customer));


    Auth::login($customer);

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
