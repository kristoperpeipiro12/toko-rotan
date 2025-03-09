<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk_Varian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $id_customer = Auth::id();
        $all_cart = Keranjang::where('id_customer', $id_customer)->get();
        return view('shop.cart', compact('all_cart'));

        // $checkout = $all_cart->contains(function ($item) {
        //     return $item->status === 'checkout';
        // });

        // if ($checkout) {
        //     return redirect()->route('shop.home');
        // } else {
        //     return view('shop.cart', compact('all_cart'));
        // }

    }
    public function store(Request $request)
    {
        $id_customer = auth()->user()->id_customer;

        $request->validate([
            'jumlah_pesanan' => 'required|int',
        ]);

        $id_varian = Produk_Varian::where('slug', $request->selected_slug)->value('id_varian');

        if (empty($id_varian)) {
            return redirect()->route('shop.home')->with('toast_error', 'Terdapat Kesalahan! Segera Hubungi Admin!');
        }

        // Cek apakah produk dengan id_varian yang sama sudah ada di keranjang
        $keranjang = Keranjang::where('id_customer', $id_customer)
            ->where('id_varian', $id_varian)
            ->first();

        if ($keranjang) {
            // Jika sudah ada, update jumlah pesanan
            $keranjang->jumlah += $request->jumlah_pesanan;
            $keranjang->save();
        } else {
            // Jika belum ada, buat entri baru di keranjang
            $timestamp = date('His-dmY'); // Format: HHMMSS-DDMMYYYY
            $id_cart = 'CART-' . rand(1000, 9999) . '-' . $timestamp;
            // $def_status = 'keranjang';

            $keranjang = new Keranjang();
            $keranjang->id_keranjang = $id_cart;
            $keranjang->id_varian = $id_varian;
            $keranjang->id_customer = $id_customer;
            $keranjang->jumlah = $request->jumlah_pesanan;
            // $keranjang->status = $def_status;
            $keranjang->save();
        }

        return redirect()->route('shop.cart')->with('toast_success', 'Masuk keranjang!');
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jumlah' => 'required|int',
        ]);

        $keranjang = Keranjang::findOrFail($id);
        $id_varian = Keranjang::where('id_keranjang', $id)->value('id_varian');

        $stok = Produk_Varian::where('id_varian', $id_varian)->value('stok');
        if ($request->jumlah > $stok) {
            return redirect()->route('shop.cart')->with('toast_error', 'Jumlah Pesanan melebihi stok yang tersedia!');
        }

        // Update jumlah
        $keranjang->jumlah = $request->jumlah;
        $keranjang->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('shop.cart')->with('toast_success', 'Jumlah Pesanan berhasil diubah.');
    }

    public function delete($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        return redirect()->route('shop.cart')->with('toast_success', 'Item berhasil dihapus!');


    }
}
