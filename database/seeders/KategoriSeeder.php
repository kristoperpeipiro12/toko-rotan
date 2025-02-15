<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            'Kategori 1',
            'Kategori 2',
            'Kategori 3',
            'Kategori 4',
            'Kategori 5',
            
        ];

        foreach ($kategori as $nama) {
            Kategori::create([
                'nama_kategori' => $nama,
            ]);
        }
    }
}
