<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::all();
        $pageTitle= 'Produk';
        return view('admin.produk.index',compact('produk','pageTitle'));
   }
   public function store(Request $request)
   {
       // Validasi input
       $validated = $request->validate([
           'id_kategori' => 'required|string|max:255|exists:kategori,id_kategori',
           'nama_produk' => 'required|string|max:255',
           'warna'       => 'required|string|max:100',
           'ukuran'      => 'required|string|max:50',
           'harga'       => 'required|numeric|min:0',
           'stok'        => 'required|integer|min:0',
       ]);

       try {
           $produk = Produk::create([
               'id_produk'   => Str::uuid()->toString(), // Auto-generate UUID for id_produk
               'id_kategori' => $validated['id_kategori'],
               'nama_produk' => $validated['nama_produk'],
               'warna'       => $validated['warna'],
               'ukuran'      => $validated['ukuran'],
               'harga'       => $validated['harga'],
               'stok'        => $validated['stok'],
           ]);

           // Flash pesan sukses
           session()->flash('success', 'Produk berhasil ditambahkan.');

           return redirect()->back();
       } catch (\Exception $e) {
           // Flash pesan error
           session()->flash('error', 'Terjadi kesalahan saat menyimpan produk.');

           return redirect()->back();
       }
    }
}
