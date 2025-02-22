<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $pageTitle = 'Kategori';
        return view("admin.kategori.index", compact('kategori', 'pageTitle'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Cek apakah nama kategori sudah ada
        if (Kategori::where('nama_kategori', $request->nama_kategori)->exists()) {
            return redirect()->back()->with('toast_error', 'Nama kategori sudah ada.');
        }

        $timestamp = date('His-dmY'); // Format: HHMMSS-DDMMYYYY
        $id_kategori = 'KAT-' . rand(1000, 9999) . '-' . $timestamp;

        // Simpan kategori baru
        $kategori = new Kategori();
        $kategori->id_kategori = $id_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.kategori')->with('toast_success', 'Kategori berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);

        // Cek apakah nama kategori sudah ada, kecuali untuk kategori yang sedang diubah
        if (Kategori::where('nama_kategori', $request->nama_kategori)->where('id_kategori', '!=', $id)->exists()) {
            return redirect()->back()->with('toast_error', 'Nama kategori sudah ada. Silakan gunakan nama lain.');
        }

        // Update kategori
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.kategori')->with('toast_success', 'Kategori berhasil diubah.');
    }


    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()->route('admin.kategori')->with('toast_success', 'Kategori berhasil dihapus.');
    }

}
