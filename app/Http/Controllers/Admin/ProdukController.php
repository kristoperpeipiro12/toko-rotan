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
        $produk = Produk::with('kategori')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id_kategori')
            ->orderByRaw('CAST(SUBSTRING(produk.nama_produk, 7) AS UNSIGNED) ASC')
            ->select('produk.*')
            ->get();
        $pageTitle = 'Daftar Produk';

        return view('admin.produk.daftar-produk', compact('produk', 'kategori', 'pageTitle'));
    }
    public function store(Request $request)
    {

        $cek_input = Produk::where('nama_produk', $request->nama_produk)
            ->first();
        if (!empty($cek_input)) {
            return redirect()->route('admin.produk')->with('toast_error', 'Porduk ' . $request->nama_produk . 'telah ada!');
        }


        // Validasi input
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], );

        if (!empty($request->id_kategori) && !empty($request->nama_produk) && !empty($request->deskripsi)) {
            Produk::create([
                'id_kategori' => $request->id_kategori,
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
            ]);
            return redirect()->route('admin.produk')->with('toast_success', 'Produk berhasil ditambahkan.');
        } else {
            return redirect()->route('admin.produk')->with('toast_error', 'Kolom tidak boleh ada yang kosong!');
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'id_kategori' => 'required|exists:kategori,id_kategori',
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',

            ],
            [
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
            'deskripsi' => $request->deskripsi,

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
