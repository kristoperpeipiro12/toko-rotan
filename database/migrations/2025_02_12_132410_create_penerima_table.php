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
        Schema::create('penerima', function (Blueprint $table) {
            $table->uuid('id_penerima')->primary();
            $table->uuid('id_customer');
            $table->string('nama_penerima');
            $table->string('nohp_penerima',15);
            $table->text('alamat');
            $table->enum('lokasi', ['Kantor', 'Rumah'])->default('Rumah')->nullable();
            $table->timestamps();

            $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima');
    }
};
