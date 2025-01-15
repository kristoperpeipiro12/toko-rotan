<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function shop()
    {
        // saat rancang backend, tambahkan parameter untuk
        // menampilkan detail yang di request!

        return view('customer.shop');
    }
}
