<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaUsaha extends Model
{
    // use HasFactory;
    use HasFactory;
    protected $table = 'skala_usaha'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['id', 'nama'];
    public function umkm()
    {
        return $this->hasMany(umkm::class, 'id_skala_usaha');
    }
}
