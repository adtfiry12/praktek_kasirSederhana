<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    protected $connection = 'mysql';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = ['nama', 'no_telp', 'role', 'password'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pengguna', 'id_pengguna');
    }
}
