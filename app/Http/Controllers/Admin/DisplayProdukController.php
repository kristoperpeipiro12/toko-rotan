<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class DisplayProdukController extends Controller
{
    public function index()
    {
        $display_produk = Produk::with('produk_varian')->get();
        $pageTitle = 'Display Produk';
        return view('admin.produk.display-produk', compact('display_produk', 'pageTitle'));
    }
}
