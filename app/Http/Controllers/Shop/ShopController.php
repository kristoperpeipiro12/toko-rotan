<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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

        $filter_slug = explode('-', $slug, limit: 4); // memisahkan
        $filter_slug = implode('-', array_slice($filter_slug, 0, 3)); // menyatukan
        $ukuran = Produk_Varian::where('slug', 'like', $filter_slug . '%')->get();  // Get all variants for the product
        $selectedUkuran = request('ukuran', $ukuran->first()->ukuran ?? null);
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
                'id_varian' => $item['id_varian'],
                'slug' => $slug,
                'warna' => $item['warna'],
                'gambar' => $item['gambar'],
            ];
        }

        return view('shop.detail', compact('produk', 'varian', 'ukuran', 'warna_portal', 'result', 'selectedUkuran'));

    }
    public function cart(Request $request)
    {
        $ukuran = $request->selected_ukuran;
        $slug = $request->selected_slug;
        if (empty($ukuran) || empty($slug)) {
            // return redirect()->route('');
        }
        return view('shop.cart', compact('slug', 'ukuran'));
    }
}
