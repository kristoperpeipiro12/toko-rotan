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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk')->primary();
            $table->string('id_kategori');
            $table->string('nama_produk');
            $table->string('warna');
            $table->string('ukuran');
            $table->double('harga');
            $table->integer('stok');
            $table->timestamps();

             $table->foreign('id_kategori')->references('id_kategori')->on('kategori')
              ->onUpdate('cascade')          
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};