<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['id', 'nama_umkm', 'logo', 'nama_pemilik', 'NIK', 'alamat', 'deskripsi_umkm', 'email', 'sosial media', 'password'];
    public function produks()
    {
        return $this->hasMany(produk::class, 'id_umkm');
    }
}
