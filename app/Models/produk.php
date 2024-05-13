<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = ['id','nama_produk', 'tagline', 'deskripsi','foto1', 'foto2', 'foto3', 'id_sektor_usaha', 'id_umkm'];

    // Relasi dengan model Umkm
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'id');
    }

    public function SektorUsaha()
    {
        return $this->belongsTo(SektorUsaha::class, 'id_sektor_usaha');
    }
}

