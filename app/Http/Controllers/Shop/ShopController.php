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

        $produk_varian = Produk_Varian::with('Produk')
        ->get()
        ->unique('warna');

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

        $ukuran = Produk_Varian::where('id_produk', $id_produk)->get();  // Get all variants for the product

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
            // $slug = Produk_Varian::where('produk_varian.id_produk', $item['id_produk']) // Gunakan alias tabel
            //     ->where('produk_varian.id_varian', $item['id_varian']) // Gunakan alias tabel
            //     ->join('produk', 'produk.id_produk', '=', 'produk_varian.id_produk')
            //     ->value('produk.slug'); // Ambil kolom slug dari tabel Produk

            $result[] = [
                'slug' => $slug,
                'warna' => $item['warna'],
                'gambar' => $item['gambar'],
            ];
        }
        // << bagian portal




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
