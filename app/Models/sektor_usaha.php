<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sektor_usaha extends Model
{
    use HasFactory;
    protected $table = 'sektor_usaha'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['id', 'nama'];
    public function umkm()
    {
        return $this->hasMany(umkm::class, 'id_sektor_usaha');
    }
    public function produks()
    {
        return $this->hasMany(produk::class, 'id_sektor_usaha');
    }
}
