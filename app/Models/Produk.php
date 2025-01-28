<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produk';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'produk';

    protected $fillable = [
        'id_produk',
        'id_kategori',
        'nama_produk',
        'deskripsi',
        'warna',
        'ukuran',
        'harga',
        'stok',
        'gambar',
        'slug',
    ];

    /**
     * Relationship with Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    /**
     * Auto-generate ID with 'PRO-' prefix.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_produk)) {
                $model->id_produk = 'PRO-' . rand(10000, 99999);
            }
        });
    }
}
