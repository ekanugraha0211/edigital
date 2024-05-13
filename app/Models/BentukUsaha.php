<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukUsaha extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'bentuk_usaha'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['id', 'nama'];
    public function umkm()
    {
        return $this->hasMany(umkm::class, 'id_bentuk_usaha');
    }
}
