<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        Customer::create([
            'id_customer' => uniqid(), // ID unik untuk primary key
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'admin',
            'no_hp' => '081234567890', // Isi default
        ]);

        // Regular Customer
        Customer::create([
            'id_customer' => uniqid(), // ID unik untuk primary key
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'customer',
            'no_hp' => '089876543210', // Isi default
        ]);
    }
}
