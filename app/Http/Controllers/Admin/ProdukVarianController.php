<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukVarianController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $produk_varian = Produk_Varian::all();
        $pageTitle = 'Varian Produk';
        return view('admin.produk.varian-produk', compact('produk_varian','produk', 'pageTitle'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'warna' => 'nullable|string|max:100',
            'ukuran' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:8192',
            'stok' => 'required|integer|min:0',
        ],[
            'gambar.image' => 'File yang diupload harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat: jpeg, png, atau jpg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 8MB.',
        ] );
 // Upload gambar jika ada
 $gambarPath = null;
 if ($request->hasFile('gambar')) {

     $filename = strtolower(str_replace(' ', '_', $request->nama_produk)) . '-' . now()->format('Y-m-d') . '.' . $request->gambar->getClientOriginalExtension();
     $gambarPath = $request->file('gambar')->storeAs('produk', $filename, 'public');
 }
        Produk_Varian::create([
            'id_produk' => $request->id_produk,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'gambar' => $gambarPath,
            'stok' => $request->stok,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('admin.produk_varian')->with('toast_success', 'Varian Produk berhasil ditambahkan.');
    }

    // yg dibawah ini belum di set
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'id_produk' => 'required|exists:produk,id_produk',
                'warna' => 'nullable|string|max:100',
                'ukuran' => 'nullable|string|max:100',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:8192',
                'stok' => 'required|integer|min:0',
            ],
        );

        $produk_varian = Produk_Varian::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($produk_varian->gambar && Storage::exists('public/' . $produk_varian->gambar)) {
                Storage::delete('public/' . $produk_varian->gambar);
            }

            $namaGambar = $request->nama_produk . '_' . date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
            $gambarPath = $request->file('gambar')->storeAs('produk', $namaGambar, 'public');
            $produk_varian->gambar = $gambarPath;
        }
        // Update produk varian
        $produk_varian->fill([
            'id_produk' => $request->id_produk,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'gambar' => $gambarPath,
            'stok' => $request->stok,
        ]);

        $produk_varian->save();

        return redirect()->route('admin.produk_varian')->with('toast_success', 'Varian Produk berhasil diubah.');
    }

    public function delete($id)
    {
        $produk_varian = Produk_Varian::findOrFail($id);
        $produk_varian->delete();

        return redirect()->route('admin.produk_varian')->with('toast_success', 'Varian Produk berhasil dihapus.');
    }
}
