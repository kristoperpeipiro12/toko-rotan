<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;

class DisplayProdukController extends Controller
{
    public function index()
    {
        $display_produk = Produk_Varian::with(['produk' => function ($query) {
            $query->orderBy('nama_produk', 'asc'); // Urutkan berdasarkan nama produk dari A-Z
        }])->get();
        // $display_produk = Produk_Varian::with('Produk')->get();
        $pageTitle = 'Display Produk';
        return view('admin.produk.display-produk', compact('display_produk', 'pageTitle'));
    }
}
