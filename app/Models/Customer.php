<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_customer';

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
    protected $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_customer',
        'username',
        'email',
        'password',
        'no_hp',
        'alamat',
    ];

    /**
     * Automatically hide attributes from arrays and JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password', // Menyembunyikan password saat data diubah menjadi array atau JSON
    ];

    /**
     * Relationships
     * A Customer can have many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_customer', 'id_customer');
    }
}