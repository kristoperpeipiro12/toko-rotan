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
        Schema::create('order', function (Blueprint $table) {
            $table->string('id_order')->primary();
            $table->uuid('id_produk');
            $table->uuid('id_customer');
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
        Schema::dropIfExists('order');
    }
};
