<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model {
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    protected $fillable = ['id_barang','nama_barang','quantity_masuk','tanggal_masuk'];

    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
