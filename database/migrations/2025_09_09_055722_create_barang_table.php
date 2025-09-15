<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->string('serial_number')->nullable();
            $table->integer('quantity_total')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('barang');
    }
};