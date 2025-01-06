<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah pengguna terautentikasi dan role-nya sesuai
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika role tidak sesuai, arahkan ke halaman login atau halaman lain sesuai role
        if ($role == 'admin') {
            return redirect()->route('login')->with('toast_error', 'Anda harus login sebagai Admin.');
        }

        return redirect()->route('shop.home')->with('toast_error', 'Anda harus login sebagai Customer.');
    }
}
