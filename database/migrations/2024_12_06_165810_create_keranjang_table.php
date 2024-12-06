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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->string('id_keranjang')->primary();
            $table->string('id_produk');
            $table->string('id_customer');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_produk')->references('id_produk')->on('produk')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_customer')->references('id_customer')->on('customer')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};