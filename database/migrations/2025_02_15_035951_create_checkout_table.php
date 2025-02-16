<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->uuid('id_checkout')->primary();
            $table->uuid('id_varian');
            $table->uuid('id_customer');
            $table->uuid('id_keranjang');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_varian')->references('id_varian')->on('produk_varian')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_customer')->references('id_customer')->on('customer')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_keranjang')->references('id_keranjang')->on('keranjang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
