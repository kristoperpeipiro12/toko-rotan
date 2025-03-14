<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Keranjang;
use App\Models\Penerima;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::id();

        $alamat = Penerima::where('id_customer', $user)
            ->orderBy('created_at', 'asc')
            ->get();
        $penerima = $alamat->first();
        $ongkir = 5000;

        if ($request->has('go_to_co')) {
            $produk_pesanan = Produk_Varian::where('id_varian', $request->produk_varian)->first();
            $jumlah_pesanan = $request->jumlah_pesanan;
            $total_harga = $produk_pesanan->harga * $jumlah_pesanan;
            $penerima = Penerima::where('id_customer', $user)
                ->orderBy('created_at', 'asc')
                ->first();

            $total_tagihan = $total_harga + $ongkir;
            return view('shop.co', compact('produk_pesanan', 'jumlah_pesanan', 'penerima', 'alamat', 'total_harga', 'ongkir', 'total_tagihan'));
        } else {
            $selectedItems = $request->input('selected_items', '');
            $selectedItemsArray = array_filter(explode(',', $selectedItems));

            $cartItems = Keranjang::with('produk_varian.produk')
                ->whereIn('id_keranjang', $selectedItemsArray)
                ->get();

            $total_harga = 0;
            foreach ($cartItems as $item) {
                $total_harga += $item->jumlah * $item->produk_varian->harga;
            }

            $total_tagihan = $total_harga + $ongkir;
            return view('shop.co', compact('cartItems', 'total_harga', 'ongkir', 'total_tagihan', 'penerima', 'alamat'))
                ->with('produk_pesanan', null);

        }

    }

    public function checkout(Request $request)
    {
        $user = auth()->user();
        $cartItems = collect(); // Inisialisasi awal

        $id_co = $this->generateCheckoutId();

        if ($request->filled('selected_items_cart')) {
            $selectedItems = $request->input('selected_items_cart', '');
            $selectedItemsArray = array_filter(explode(',', $selectedItems));

            $cartItems = Keranjang::with('produk_varian.produk')
                ->whereIn('id_keranjang', $selectedItemsArray)
                ->get();

            foreach ($cartItems as $cart) {
                $id_co = $this->generateCheckoutId();
                $co = new Checkout();
                $co->id_checkout = $id_co;
                $co->id_varian = $cart->id_varian;
                $co->id_customer = $cart->id_customer;
                $co->jumlah = $cart->jumlah;
                $co->save();

                $update_stok = Produk_Varian::findOrFail($cart->id_varian);
                $update_stok->stok -= $cart->jumlah;
                $update_stok->save();

                $keranjang = Keranjang::findOrFail($cart->id_keranjang);
                $keranjang->delete();
            }
        } else {
            // $request->validate([
            //     'id_varian' => 'required|exists:produk_varian,id_varian',
            //     // 'id_customer' => 'required|exists:customers,id_customer',
            //     'jumlah' => 'required|integer',
            // ]);

            $produk_co = Produk_Varian::where('id_varian', $request->id_varian)->first();

            $co = new Checkout();
            $co->id_checkout = $id_co;
            $co->id_varian = $request->id_varian;
            $co->id_customer = $request->id_customer;
            $co->jumlah = $request->jumlah;
            $co->save();

            $update_stok = Produk_Varian::findOrFail($request->id_varian);
            $update_stok->stok -= $request->jumlah;
            $update_stok->save();
        }

        Mail::to($user->email)->send(new OrderConfirmation());

        return redirect()->route('shop.home', compact('cartItems'))->with('success', 'Email konfirmasi pesanan telah dikirim.');
    }

    private function generateCheckoutId()
    {
        $timestamp = date('His-dmY');
        return 'CO-' . rand(1000, 9999) . '-' . $timestamp;
    }

    public function store($id)
    {
        return redirect()->route('shop.co');
    }
}