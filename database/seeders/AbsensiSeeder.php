<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder {
    public function run(): void {
        DB::table('absensi')->insert([
            [
                'id_pegawai' => 1,
                'tanggal' => '2025-09-01',
                'jam_masuk' => '08:00:00',
                'jam_keluar' => '16:00:00',
                'total_jam' => 8,
                'status' => 'Hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pegawai' => 2,
                'tanggal' => '2025-09-01',
                'jam_masuk' => '09:00:00',
                'jam_keluar' => '17:00:00',
                'total_jam' => 8,
                'status' => 'Hadir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
