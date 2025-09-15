<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Pegawai
        DB::table('pegawai')->insert([
            ['nama' => 'Budi Santoso', 'nik_ktp' => '3276010101010001', 'no_kk' => '3276010101010002', 'no_bpjs' => '1234567890', 'no_jmo' => 'JMO12345', 'no_npwp' => '123456789012345', 'badge_id' => '79001', 'role' => 'helper', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Siti Aminah', 'nik_ktp' => '3276010101010003', 'no_kk' => '3276010101010004', 'no_bpjs' => '0987654321', 'no_jmo' => 'JMO67890', 'no_npwp' => '987654321098765', 'badge_id' => '79002', 'role' => 'supervisor', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Barang Masuk
        DB::table('barang_masuk')->insert([
            ['nama_barang' => 'Besi Beton', 'quantity_masuk' => 100, 'tanggal_masuk' => Carbon::today(), 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Semen', 'quantity_masuk' => 50, 'tanggal_masuk' => Carbon::today()->subDay(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Barang Keluar
        DB::table('barang_keluar')->insert([
            ['nama_barang' => 'Besi Beton', 'quantity_keluar' => 20, 'tanggal_keluar' => Carbon::today(), 'created_at' => now(), 'updated_at' => now()],
            ['nama_barang' => 'Semen', 'quantity_keluar' => 10, 'tanggal_keluar' => Carbon::today()->subDay(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Absensi
        DB::table('absensi')->insert([
            ['pegawai_id' => 1, 'tanggal' => Carbon::today(), 'status' => 'Hadir', 'created_at' => now(), 'updated_at' => now()],
            ['pegawai_id' => 2, 'tanggal' => Carbon::today(), 'status' => 'Izin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
