<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_transaksi','kode_transaksi','id_pelanggan', 'total', 'bayar', 'kembali', 'id_pengguna'];

    public function Pengguna() {
        $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function barang() {
        $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
