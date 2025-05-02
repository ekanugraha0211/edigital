<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['umkm_id', 'nama', 'deskripsi', 'harga', 'stok'];

    public function umkm()
    {
        return $this->belongsTo(UMKM::class, 'umkm_id');
    }

    public function gambarProduk()
    {
        return $this->hasMany(GambarProduk::class);
    }
}

