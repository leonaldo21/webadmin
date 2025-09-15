<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->foreignId('id_pegawai')->constrained('pegawai','id_pegawai')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->decimal('total_jam', 5,2);
            $table->string('status'); // hadir, sakit, izin
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('absensi');
    }
};
