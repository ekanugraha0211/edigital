<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $table = 'kontak';
    protected $fillable = ['id', 'nama', 'subjek', 'email', 'pesan'];
}
