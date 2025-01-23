<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    // Primary Key
    protected $primaryKey = 'id_customer';
    public $incrementing = false;
    protected $keyType = 'string';

    // Table Name
    protected $table = 'customer';

    // Fillable Attributes
    protected $fillable = [
        'id_customer',
        'name',
        'email',
        'password',
        'no_hp',
        'alamat',
        'role',
    ];

    // Hidden Attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Pastikan hashing di controller/service layer saat membuat pengguna
    ];

    /**
     * Check if the customer is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the customer is a regular customer.
     *
     * @return bool
     */
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    /**
     * Define the relationship to the Order model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_customer', 'id_customer');
    }
}
