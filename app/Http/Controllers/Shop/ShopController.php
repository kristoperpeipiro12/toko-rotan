<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.home');
    }

    public function shop()
    {
        $produk_varian = Produk_Varian::with('Produk')->get();
        return view('shop.shop', compact('produk_varian'));
    }

    public function about()
    {
        return view('shop.about');
    }

    public function detail($slug)
    {
         // Cari produk berdasarkan slug
    $produk = Produk_Varian::where('slug', $slug)->with('produk_varian')->first();

    // Jika produk tidak ditemukan, bisa diarahkan ke halaman 404
    if (!$produk) {
        abort(404, 'Produk tidak ditemukan');
    }

    return view('shop.detail', compact('produk'));

        // $produk = Produk::where('slug', $slug)->first();
        // $produk_varian = Produk_Varian::with('Produk')->get();
        // return view('shop.detail', compact('produk','produk_varian'));
    }
    public function cart()
    {
        return view('shop.cart');
    }

    public function account()
    {
        return view('shop.account.pages.account');
    }
}
