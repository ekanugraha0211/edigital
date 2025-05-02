<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaUsaha extends Model
{
    use HasFactory;
    protected $table = 'skala_usaha';
    protected $fillable = ['nama'];
}
