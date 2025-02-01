<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Produk_Varian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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


        foreach ($produk as $produkItem) {

            for ($i = 0; $i < 3; $i++) {
                Produk_Varian::create([
                    'id_produk' => $produkItem->id_produk,
                    'warna' => $warna[array_rand($warna)],
                    'ukuran' => $ukuran[$i],
                    'harga' => $harga[$i],
                    'gambar' => $gambarBaseUrl . '?random=' . rand(1, 1000),
                    'stok' => rand(10, 100),
                    'slug' => Str::slug($produkItem->nama_produk . '-' . $i),

                ]);
            }
        }
    }
}
