<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_keranjang';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'keranjang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_keranjang',
        'id_varian',
        'id_customer',
        'jumlah',
        'status',
    ];

    /**
     * Relationship with Produk.
     * A Keranjang belongs to one Produk.
     */
    public function produk_varian()
    {
        return $this->belongsTo(Produk_Varian::class, 'id_varian', 'id_varian');
    }

    /**
     * Relationship with Customer.
     * A Keranjang belongs to one Customer.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }
}
