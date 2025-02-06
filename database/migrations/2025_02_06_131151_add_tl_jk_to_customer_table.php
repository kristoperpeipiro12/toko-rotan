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
        Schema::table('customer', function (Blueprint $table) {
            $table->date('tanggal_lahir')->nullable()->after('role');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan', 'Lainnya'])->nullable()->after('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn(['tanggal_lahir', 'jenis_kelamin']);
        });
    }
};
