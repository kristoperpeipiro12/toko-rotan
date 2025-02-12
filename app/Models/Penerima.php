<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penerima extends Model
{

    use HasFactory, HasUuids;

    protected $table = 'penerima';
    protected $primaryKey = 'id_penerima';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_penerima',
        'id_customer',
        'nama_penerima',
        'nohp_penerima',
        'alamat',
        'lokasi',
    ];

    /**
     * Relasi ke model Customer.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }
}
