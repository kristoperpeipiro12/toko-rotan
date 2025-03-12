<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_checkout';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'checkout';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_varian',
        'id_customer',
        'jumlah',
        'status',
    ];

    public function produk_varian()
    {
        return $this->belongsTo(Produk_Varian::class, 'id_varian', 'id_varian');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

}
