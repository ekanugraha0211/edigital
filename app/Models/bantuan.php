<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bantuan extends Model
{
    use HasFactory;
    protected $table = 'bantuan';
    protected $fillable = ['id','pertanyaan','jawaban'];
}