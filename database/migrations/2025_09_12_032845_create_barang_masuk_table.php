<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_barang_masuk');
            $table->foreignId('id_barang')->constrained('barang','id_barang')->onDelete('cascade');
            $table->date('tanggal_masuk');
            $table->integer('quantity_masuk');
            $table->foreignId('diterima_oleh')->constrained('pegawai','id_pegawai')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('barang_masuk');
    }
};
