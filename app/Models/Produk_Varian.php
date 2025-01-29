<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_Varian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_varian';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'produk_varian';
    protected $fillable = [
        'id_varian',
        'id_produk',
        'warna',
        'ukuran',
        'stok',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk_Varian::class, 'id_produk', 'id_produk');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_varian)) {
                $timestamp = date('His-dmY'); // Format: HHMMSS-DDMMYYYY
                $model->id_produk = 'VAR-' . rand(10000, 99999) . '-' . $timestamp;
            }
        });
    }
}
