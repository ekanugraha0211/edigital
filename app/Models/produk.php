<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'deskripsi', 'harga','umkm_id'];

    public function umkm()
    {
        return $this->belongsTo(UMKM::class, 'umkm_id');
    }

    public function gambarProduk()
    {
        return $this->hasMany(GambarProduk::class, 'produk_id');
    }
    public function Pesanan(){
        return $this->hasMany(Pesanan::class,'produk_id');
    }
}

