<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;

class ProdukVarianController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'warna' => 'nullable|string|max:100',
            'ukuran' => 'nullable|string|max:50',
            'stok' => 'required|integer|min:0',
        ], );

        Produk_Varian::create([
            'id_produk' => $request->id_produk,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('admin.produk')->with('toast_success', 'Varian Produk berhasil ditambahkan.');
    }

    // yg dibawah ini belum di set
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'id_produk' => 'required|exists:produk,id_produk',
                'warna' => 'nullable|string|max:100',
                'ukuran' => 'nullable|string|max:100',
                'stok' => 'required|integer|min:0',
            ],
        );

        $produk_varian = Produk_Varian::findOrFail($id);

        // Update produk varian
        $produk_varian->fill([
            'id_produk' => $request->id_produk,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok,
        ]);

        $produk_varian->save();

        return redirect()->route('admin.produk')->with('toast_success', 'Varian Produk berhasil diubah.');
    }

    public function delete($id)
    {
        $produk_varian = Produk_Varian::findOrFail($id);
        $produk_varian->delete();

        return redirect()->route('admin.produk')->with('toast_success', 'Varian Produk berhasil dihapus.');
    }
}
