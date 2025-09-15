<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder {
    public function run(): void {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Besi Hollow',
                'serial_number' => 'SN001',
                'quantity_total' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_barang' => 'Cat Tembok',
                'serial_number' => 'SN002',
                'quantity_total' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
