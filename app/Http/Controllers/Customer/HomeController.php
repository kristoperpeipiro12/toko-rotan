<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function detail()
    {
        // saat rancang backend, tambahkan parameter untuk 
        // menampilkan detail yang di request!

        return view('customer.detail');
    }
}