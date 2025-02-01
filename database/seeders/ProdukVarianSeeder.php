<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk_Varian;
use App\Models\Produk;

class ProdukVarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua produk yang sudah ada
        $produk = Produk::all();

        // Data dummy untuk ukuran, warna, dan harga
        $ukuran = ['10 cm x 10 cm', '20 cm x 20 cm', '30 cm x 30 cm', '40 cm x 40 cm', '50 cm x 50 cm', '60 cm x 60 cm', '70 cm x 70 cm', '80 cm x 80 cm', '90 cm x 90 cm', '100 cm x 100 cm'];
        $warna = ['Coklat Tua', 'Coklat Muda', 'Motif', 'Polos', 'Natural'];
        $harga = [100000, 120000, 140000, 160000, 180000, 200000, 220000, 240000, 260000, 280000];

        // URL gambar acak dari Picsum (contoh: https://picsum.photos/200/300)
        $gambarBaseUrl = 'https://picsum.photos/200/300'; // URL gambar acak dengan ukuran 200x300

        // Loop untuk setiap produk
        foreach ($produk as $produkItem) {
            // Buat 10 varian untuk setiap produk
            for ($i = 0; $i < 10; $i++) {
                Produk_Varian::create([
                    'id_produk' => $produkItem->id_produk, // Pastikan kolom ini sesuai dengan struktur tabel
                    'warna' => $warna[array_rand($warna)], // Pilih warna acak dari array
                    'ukuran' => $ukuran[$i], // Gunakan indeks $i untuk ukuran
                    'harga' => $harga[$i], // Gunakan indeks $i untuk harga
                    'gambar' => $gambarBaseUrl . '?random=' . rand(1, 1000), // URL gambar acak
                    'stok' => rand(10, 100), // Stok acak antara 10 dan 100
                ]);
            }
        }
    }
}
