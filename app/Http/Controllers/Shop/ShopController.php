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

    // public function shop()
    // {

    //     $produk_varian = Produk_Varian::with('Produk') // Mengambil relasi Produk
    //         ->get()
    //         ->groupBy('warna') // Mengelompokkan berdasarkan warna
    //         ->map(function ($group) {
    //             // Jika ada lebih dari satu produk dalam grup warna yang sama, kita tidak perlu menyaring berdasarkan nama produk
    //             return $group; // Kembalikan semua produk dengan warna yang sama
    //         })
    //         ->flatten(); // Flatten hasilnya untuk mendapatkan data dalam satu array



    //     return view('shop.shop', compact('produk_varian'));
    // }

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

        return view('shop.shop', compact('produk_varian'));
    }

    public function about()
    {
        return view('shop.about');
    }

    public function detail($slug)
    {
        // Assuming 'id_varian' is the key that links to the color data
        $produk = Produk_Varian::where('slug', $slug)->first();

        $id_produk = Produk_Varian::where('slug', $slug)->pluck('id_produk')->first();

        $varian = Produk_Varian::where('id_produk', $id_produk)->first();

        $ukuran = Produk_Varian::where('slug', $slug)->get();  // Get all variants for the product

        // bagian portal >>
        $warna_portal = Produk_Varian::where('id_produk', $id_produk)
            ->distinct()
            ->pluck('warna')
            ->all();

        // Ambil hanya satu varian per warna
        $gambar_warna = Produk_Varian::where('id_produk', $id_produk)
            ->whereIn('warna', $warna_portal)
            ->get(['warna', 'gambar', 'id_varian', 'id_produk'])
            ->groupBy('warna') // Kelompokkan berdasarkan warna
            ->map(fn($items) => $items->first()) // Ambil hanya satu (yang pertama) per warna
            ->values()
            ->toArray();

        $result = [];

        foreach ($gambar_warna as $item) {
            $slug = Produk_Varian::where('id_produk', $item['id_produk'])
                ->where('id_varian', $item['id_varian'])
                ->value('slug');


            $result[] = [
                'slug' => $slug,
                'warna' => $item['warna'],
                'gambar' => $item['gambar'],
            ];
        }
        // << bagian portal

        // $harga = Produk_Varian::where('id_produk', $id_produk)
        //     ->where('')
        //     ->first();




        return view('shop.detail', compact('produk', 'varian', 'ukuran', 'warna_portal', 'result'));

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
