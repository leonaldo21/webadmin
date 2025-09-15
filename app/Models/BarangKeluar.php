<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model {
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_keluar';
    protected $fillable = ['id_barang','nama_barang','quantity_keluar','tanggal_keluar'];

    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
