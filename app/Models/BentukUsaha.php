<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukUsaha extends Model
{
    use HasFactory;
    protected $table = 'bentuk_usaha';
    protected $fillable = ['id', 'nama'];

    public function umkm(){
        return $this->hasMany(UMKM::class, 'bentuk_usaha_id');
    }
}
