<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Produk_Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukVarianController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::all();

        // Jika ada filter berdasarkan id_produk
        $query = Produk_Varian::query();
        if ($request->has('id_produk') && $request->id_produk != '') {
            $query->where('id_produk', $request->id_produk);
        }
        $filter_produk = $query->paginate(5);
        $produk_varian = Produk_Varian::with('produk')
            ->join('produk', 'produk_varian.id_produk', '=', 'produk.id_produk')
            ->orderByRaw('CAST(SUBSTRING(produk.nama_produk, 7) AS UNSIGNED) ASC') // Sesuaikan dengan pola nama produk
            ->select('produk_varian.*')
            ->get();
        $pageTitle = 'Varian Produk';
        return view('admin.produk.varian-produk', compact('produk_varian', 'produk', 'pageTitle', 'filter_produk'));
    }
    public function store(Request $request)
    {
        $nama_produk = Produk::where('id_produk', $request->id_produk)->pluck('nama_produk')->first();
        $cek_input = Produk_Varian::where('id_produk', $request->id_produk)
            ->where('warna', $request->warna)
            ->where('ukuran', $request->ukuran)
            ->first();
        if (!empty($cek_input)) {
            return redirect()->route('admin.produk_varian')->with('toast_error', 'Varian tersebut telah dimiliki Produk ' . $nama_produk . '!');
        }

        $request->merge([
            'harga' => str_replace('.', '', $request->harga),
        ]);
        // Validasi input
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'warna' => 'nullable|string|max:100',
            'ukuran' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:8192',
            'harga' => 'required|numeric|min:0|max:1000000000',
            'stok' => 'required|integer|min:0',
        ], [
            'harga.numeric' => 'Harga harus berupa angka tanpa format ribuan.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'harga.max' => 'Harga tidak boleh lebih dari 1.000.000.000.',
            'gambar.image' => 'File yang diupload harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat: jpeg, png, atau jpg.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 8MB.',
        ]);
        // Upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {

            $filename = now()->format('H-i-s') . '-' . now()->format('Y-m-d') . '.' . $request->gambar->getClientOriginalExtension();
            $gambarPath = $request->file('gambar')->storeAs('produk', $filename, 'public');

        }
        Produk_Varian::create([
            'id_produk' => $request->id_produk,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'stok' => $request->stok,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('admin.produk_varian')->with('toast_success', 'Varian Produk berhasil ditambahkan.');
    }

    // yg dibawah ini belum di set
    public function update(Request $request, $id)
    {
        $request->merge([
            'harga' => str_replace('.', '', $request->harga),
        ]);
        $request->validate(
            [
                'id_produk' => 'required|exists:produk,id_produk',
                'warna' => 'nullable|string|max:100',
                'ukuran' => 'nullable|string|max:100',
                'harga' => 'required|numeric|min:0',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:8192',
                'stok' => 'required|integer|min:0',
            ],
            [
                'harga.numeric' => 'Harga harus berupa angka tanpa format ribuan.',
                'harga.min' => 'Harga tidak boleh kurang dari 0.',
                'harga.max' => 'Harga tidak boleh lebih dari 1.000.000.000.',
            ]
        );

        $produk_varian = Produk_Varian::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($produk_varian->gambar && Storage::exists('public/' . $produk_varian->gambar)) {
                Storage::delete('public/' . $produk_varian->gambar);
            }

            $namaGambar = $request->id_varian . '_' . date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();
            $gambarPath = $request->file('gambar')->storeAs('produk', $namaGambar, 'public');
            $produk_varian->gambar = $gambarPath;
        }
        // Update produk varian
        $produk_varian->fill([
            'id_produk' => $request->id_produk,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            // 'gambar' => $gambarPath,
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
