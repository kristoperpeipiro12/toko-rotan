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
        return view("admin.kategori.index", compact('kategori', 'pageTitle'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

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
