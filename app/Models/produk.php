<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['id','nama_produk', 'tagline', 'deskripsi','foto', 'id_kategori', 'id_umkm' ];

    // Relasi dengan model Umkm
    public function umkm()
    {
        return $this->belongsTo(umkm::class, 'id_umkm');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
}
