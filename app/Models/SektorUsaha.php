<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorUsaha extends Model
{
    use HasFactory;
    protected $table = 'sektor_usaha';
    protected $fillable = ['nama'];
}
