<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder {
    public function run(): void {
        DB::table('pegawai')->insert([
            [
                'nama' => 'Budi Santoso',
                'nik_ktp' => '3276010101010001',
                'no_kk' => '3276010101011111',
                'no_bpjs' => 'BPJS001',
                'no_jmo' => 'JMO001',
                'no_npwp' => 'NPWP001',
                'badge_id' => 'BDG001',
                'role' => 'helper',
                'dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'nik_ktp' => '3276010101010002',
                'no_kk' => '3276010101012222',
                'no_bpjs' => 'BPJS002',
                'no_jmo' => 'JMO002',
                'no_npwp' => 'NPWP002',
                'badge_id' => 'BDG002',
                'role' => 'supervisor',
                'dokumen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
