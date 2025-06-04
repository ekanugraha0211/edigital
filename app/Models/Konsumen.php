<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumen';

    protected $primaryKey = 'id';
    protected $fillable = ['id', 'users_id', 'alamat','no_hp'];

    public $timestamps = false; // Karena di tabel tidak ada created_at / updated_at

     

    /**
     * Relasi ke tabel `user`
     * Satu konsumen dimiliki oleh satu user
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Relasi ke tabel `pesanan`
     * Satu konsumen bisa memiliki banyak pesanan
     */
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'konsumen_id');
    }
}
