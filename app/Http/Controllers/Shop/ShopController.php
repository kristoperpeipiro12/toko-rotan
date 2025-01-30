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
// Assuming 'id_varian' is the key that links to the color data
$produk = Produk::where('slug', $slug)->first();

$id_produk = Produk::where('slug', $slug)->pluck('id_produk')->first();
$varian = Produk_Varian::where('id_produk', $id_produk)->first();

$warna = Produk_Varian::where('id_produk', $id_produk)->get();  // Get all variants for the product

return view('shop.detail', compact('produk', 'varian', 'warna'));


        // Cari produk berdasarkan slug
        // $produk = Produk::where('slug', $slug)->first();

        // $id_produk = Produk::where('slug', $slug)->pluck('id_produk')->first();
        // $varian = Produk_Varian::where('id_produk', $id_produk)->first();

        // $id_varian = Produk_Varian::where('id_produk', $id_produk)->pluck('id_varian')->first();
        // $warna = Produk_Varian::where('id_varian', $id_varian)->get();


        // return view('shop.detail', compact('produk', 'varian', 'warna'));

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
