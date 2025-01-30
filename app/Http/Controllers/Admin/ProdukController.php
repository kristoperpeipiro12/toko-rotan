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
        $pageTitle = 'Daftar Produk';

        return view('admin.produk.daftar-produk', compact('produk', 'kategori', 'pageTitle'));
    }
    public function store(Request $request)
    {


        // Validasi input
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

        ],);

        Produk::create([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,

            'slug' => Str::slug($request->nama_produk),
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('admin.produk')->with('toast_success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'id_kategori' => 'required|exists:kategori,id_kategori',
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',


                // 'slug' => 'required|string|max:255',
            ],
            [
                'gambar.image' => 'File yang diupload harus berupa gambar.',
                'gambar.mimes' => 'Gambar harus berformat: jpeg, png, atau jpg.',
                'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'nama_produk.required' => 'Nama produk terlalu panjang',

            ]
        );

        $produk = Produk::findOrFail($id);


        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
                Storage::delete('public/' . $produk->gambar);
            }

            $namaGambar = $request->nama_produk . '_' . date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
            $gambarPath = $request->file('gambar')->storeAs('produk', $namaGambar, 'public');
            $produk->gambar = $gambarPath;
        }

        // Update produk
        $produk->fill([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'deskripsi'=> $request->deskripsi,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            
            'stok' => $request->stok,
            'slug' => Str::slug($request->nama_produk)
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
