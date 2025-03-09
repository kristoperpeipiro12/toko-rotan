<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Penerima;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::id();
        $alamat = Penerima::where('id_customer', $user)
            ->orderBy('created_at', 'asc') // Urutkan berdasarkan tanggal pembuatan paling awal
            ->get();

        $penerima = $alamat->first();
        $selectedItems = $request->input('selected_items', ''); // Default ke string kosong
        $selectedItemsArray = array_filter(explode(',', $selectedItems)); // Hapus nilai kosong

        $cartItems = Keranjang::with('produk_varian.produk') // Panggil relasi yang benar
            ->whereIn('id_keranjang', $selectedItemsArray)
            ->get();

        $total_harga = 0;
        foreach ($cartItems as $item) {
            $total_harga += $item->jumlah * $item->produk_varian->harga;
        }

        $ongkir = 5000;
        $total_tagihan = $total_harga + $ongkir;

        return view('shop.co', compact('cartItems', 'total_harga', 'ongkir', 'total_tagihan', 'penerima', 'alamat'));
    }

    public function store($id)
    {
        return redirect()->route('shop.co');
    }
}
