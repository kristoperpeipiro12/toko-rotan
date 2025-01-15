<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $pageTitle = 'Kategori';
        return view("admin.kategori.index",compact('kategori','pageTitle'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $id_kategori = 'KAT-' . rand(1000, 9999);

        // Simpan kategori baru
        $kategori = new Kategori();
        $kategori->id_kategori = $id_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Temukan dan update kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diperbarui.');
    }


public function delete($id)
{
    $kategori = Kategori::findOrFail($id);

    $kategori->delete();

    // Setelah penghapusan, ambil semua kategori lagi dan kirimkan ke view
    $kategori = Kategori::all(); // Mengambil kembali daftar kategori yang sudah diperbarui
    $pageTitle = 'Kategori';

    // Redirect kembali ke halaman index dengan data kategori yang sudah diperbarui
    return view('admin.kategori.index', compact('kategori','pageTitle'))->with('toast_success', 'Kategori berhasil dihapus.');
}
}
