<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model {
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'nama',
        'nik_ktp',
        'no_kk',
        'no_bpjs',
        'no_jmo',
        'no_npwp',
        'badge_id',
        'role',
        'dokumen',
    ];
}
