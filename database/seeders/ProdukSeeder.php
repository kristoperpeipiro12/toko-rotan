<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua kategori yang sudah ada
        $kategori = Kategori::all();

        // Data dummy produk (18 produk dengan nama angka)
        $produk = [];
        for ($i = 1; $i <= 18; $i++) {
            $produk[] = [
                'nama_produk' => 'Produk'.$i, // Nama produk berupa angka
                'deskripsi' => 'Deskripsi untuk Produk ' . $i,

            ];
        }

        // Loop untuk membuat produk
        foreach ($kategori as $index => $kategoriItem) {
            // Ambil 3 produk untuk setiap kategori
            for ($i = 0; $i < 3; $i++) {
                $produkIndex = ($index * 3) + $i;
                if (isset($produk[$produkIndex])) {
                    Produk::create([
                        'id_kategori' => $kategoriItem->id_kategori,
                        'nama_produk' => $produk[$produkIndex]['nama_produk'],
                        'deskripsi' => $produk[$produkIndex]['deskripsi'],
                     
                    ]);
                }
            }
        }
    }
}
