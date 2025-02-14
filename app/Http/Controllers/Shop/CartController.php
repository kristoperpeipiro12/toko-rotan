<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk_Varian;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $id_customer = Auth::id();
        $all_cart = Keranjang::where('id_customer', $id_customer)->get();
        return view('shop.cart', compact('all_cart'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pesanan' => 'required|int|max:11',
        ]);

        $timestamp = date('His-dmY'); // Format: HHMMSS-DDMMYYYY
        $id_cart = 'CART-' . rand(1000, 9999) . '-' . $timestamp;

        $id_varian = Produk_Varian::where('slug', $request->selected_slug)->value('id_varian');
        if (empty($id_varian)) {
            return redirect()->route('shop.home')->with('toast_error', 'Terdapat Kesalahan! Segera Hubungi Admin!');
        }
        $keranjang = new Keranjang();
        $keranjang->id_keranjang = $id_cart;
        $keranjang->id_varian = $id_varian;
        $keranjang->id_customer = '67ac78589f7db'; // masa percobaan
        $keranjang->jumlah = $request->jumlah_pesanan;
        $keranjang->save();
        return redirect()->route('shop.cart')->with('toast_success', 'masuk keranjang!'); // hapus toast saat semua sudah fix
    }

    public function delete($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        return back()->with('toast_success', 'Item berhasil dihapus!');
    }
}
