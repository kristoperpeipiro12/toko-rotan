<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('customer.home');
        // return view('shop.account');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function shop()
    {
        return view('customer.shop');
    }
}
