<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangKeluarSeeder extends Seeder {
    public function run(): void {
        DB::table('barang_keluar')->insert([
            [
                'id_barang' => 1,
                'tanggal_keluar' => Carbon::today(),
                'quantity_keluar' => 5,
                'diminta_oleh' => 1,
                'disetujui_oleh' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_barang' => 2,
                'tanggal_keluar' => Carbon::yesterday(),
                'quantity_keluar' => 3,
                'diminta_oleh' => 2,
                'disetujui_oleh' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
