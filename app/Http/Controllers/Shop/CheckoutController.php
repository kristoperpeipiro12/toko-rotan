<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index(Request $request)
    {
        $id_customer = Auth::id();
        $jumlah = $request->jumlah;
        if ($request->filled('id_keranjang') && !$request->filled('id_varian')) {
            $id_keranjang = Keranjang::where('id_keranjang',$request->id_keranjang)->first();
            $biaya = $jumlah * $id_keranjang->produk_varian->harga;
            return view('shop.co',compact('id_customer','id_keranjang','biaya'));
        } elseif (!$request->filled('id_keranjang') && $request->filled('id_varian')){
            $pesanan = Produk_Varian::where('id_varian',$request->id_varian)->first();
            $biaya = $jumlah * $pesanan->harga;
            return view('shop.co',compact('id_customer','pesanan','biaya'));
        }

    }

    public function store($id)
    {
        return redirect()->route('shop.co');
    }
}
