<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorUsaha extends Model
{
    use HasFactory;
    protected $table = 'sektor_usaha';
    protected $fillable = ['id','nama'];

    public function umkm(){
        return $this->hasMany(UMKM::class, 'sektor_usaha_id');
    }
};

