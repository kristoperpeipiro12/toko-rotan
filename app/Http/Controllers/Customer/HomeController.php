<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Produk_Varian;

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
        $produk_varian = Produk_Varian::with('Produk') // Mengambil relasi Produk
            ->get()
            ->groupBy('id_produk') // Mengelompokkan berdasarkan ID produk
            ->map(function ($group) {
                // Mengelompokkan varian produk berdasarkan warna
                return $group->unique('warna');
            })
            ->flatten(); // Flatten hasilnya untuk mendapatkan data dalam satu array

        return view('customer.shop', compact('produk_varian'));
    }
}
