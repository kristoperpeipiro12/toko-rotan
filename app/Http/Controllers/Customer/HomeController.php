<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Produk;

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
        $produk = Produk::all();
        return view('customer.shop', compact('produk'));
    }
}
