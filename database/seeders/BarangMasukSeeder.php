<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangMasukSeeder extends Seeder {
    public function run(): void {
        DB::table('barang_masuk')->insert([
            [
                'id_barang' => 1,
                'tanggal_masuk' => Carbon::today(),
                'quantity_masuk' => 20,
                'diterima_oleh' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_barang' => 2,
                'tanggal_masuk' => Carbon::yesterday(),
                'quantity_masuk' => 10,
                'diterima_oleh' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
