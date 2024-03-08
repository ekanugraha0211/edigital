<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class beranda extends Model
{
    use HasFactory;

    protected $table = 'beranda'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['id', 'judul', 'deskripsi', 'berita', 'foto'];
}
