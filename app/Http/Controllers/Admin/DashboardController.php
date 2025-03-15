<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Produk_Varian;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        $stok = Produk_Varian::sum('stok');
        $pesanan = Checkout::all()->groupBy('status');
        $terjual = Checkout::where('status', 'diterima')->count();
        $terkirim = Checkout::where('status','dikirim')->count();
        $totalPemasukan = Checkout::join('produk_varian', 'checkout.id_varian', '=', 'produk_varian.id_varian')
    ->where('checkout.status','diterima')
    ->sum(DB::raw('checkout.jumlah * produk_varian.harga'));
    $totalPemasukan = 'Rp ' . number_format($totalPemasukan, 0, ',', '.');

        return view("admin.dashboard.index",compact('pageTitle','stok','terjual','terkirim','totalPemasukan'));
        // return view(view: "admin.dashboard.index");

    }
}
