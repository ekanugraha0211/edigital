<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['id', 'users_id','nama','alamat','whatsapp','jumlah', 'status', 'catatan', 'produk_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
