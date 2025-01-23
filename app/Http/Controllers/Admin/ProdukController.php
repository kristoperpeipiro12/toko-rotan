<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $produk = Produk::with('kategori')->get();
        $pageTitle = 'Produk';

        return view('admin.produk.index', compact('produk', 'kategori','pageTitle'));
    }
    public function store(Request $request)
{
    // Hapus format ribuan dari input harga
    $request->merge([
        'harga' => str_replace('.', '', $request->harga),
    ]);

    // Validasi input
    $request->validate([
        'id_kategori'  => 'required|exists:kategori,id_kategori',
        'nama_produk'  => 'required|string|max:255',
        'warna'        => 'nullable|string|max:100',
        'ukuran'       => 'nullable|string|max:50',
        'harga'        => 'required|numeric|min:0|max:1000000000', // Tambahkan validasi max
        'stok'         => 'required|integer|min:0',
        'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'harga.numeric' => 'Harga harus berupa angka tanpa format ribuan.',
        'harga.min' => 'Harga tidak boleh kurang dari 0.',
        'harga.max' => 'Harga tidak boleh lebih dari 1.000.000.000.',
    ]);

    // Upload gambar jika ada
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('produk', 'public');
    }

    // Simpan produk baru ke database
    Produk::create([
        'id_kategori'  => $request->id_kategori,
        'nama_produk'  => $request->nama_produk,
        'warna'        => $request->warna,
        'ukuran'       => $request->ukuran,
        'harga'        => $request->harga,
        'stok'         => $request->stok,
        'gambar'       => $gambarPath,
    ]);

    // Redirect dengan notifikasi sukses
    return redirect()->route('admin.produk')->with('toast_success', 'Produk berhasil ditambahkan.');
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|string|max:255',
            'warna'       => 'nullable|string|max:100',
            'ukuran'      => 'nullable|string|max:100',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        // Hapus gambar lama jika ada gambar baru
        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
                Storage::delete('public/' . $produk->gambar);
            }
            $gambarPath = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $gambarPath;
        }

        // Update produk
        $produk->fill([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'warna'       => $request->warna,
            'ukuran'      => $request->ukuran,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
        ]);

        $produk->save();

        return redirect()->route('admin.produk')->with('toast_success', 'Produk berhasil diubah.');
    }

public function delete($id)
{
    $produk = Produk::findOrFail($id);
    $produk->delete();

    return redirect()->route('admin.produk')->with('toast_success', 'Produk berhasil dihapus.');
}

}
