<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_barang_keluar');
            $table->foreignId('id_barang')->constrained('barang','id_barang')->onDelete('cascade');
            $table->date('tanggal_keluar');
            $table->integer('quantity_keluar');
            $table->foreignId('diminta_oleh')->constrained('pegawai','id_pegawai')->onDelete('cascade');
            $table->foreignId('disetujui_oleh')->constrained('pegawai','id_pegawai')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('barang_keluar');
    }
};
