<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.home');
    }

    public function shop()
    {
        $produk = Produk::all();
        return view('shop.shop', compact('produk'));
    }

    public function about()
    {
        return view('shop.about');
    }

    public function detail()
    {
        return view('shop.detail');
    }
    public function cart()
    {
        return view('shop.cart');
    }
}
