<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['id_kategori', 'kode_barang', 'nama_barang', 'harga', 'stok', 'tgl_expired'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_barang', 'id_barang');
    }
}
