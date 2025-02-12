<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->uuid('id_keranjang')->primary();
            $table->uuid('id_varian');
            $table->uuid('id_customer');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_varian')->references('id_varian')->on('produk_varian')
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
