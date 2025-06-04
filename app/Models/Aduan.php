<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $table = 'aduan';

    protected $primaryKey = 'id';

    public $timestamps = false; // Karena tidak ada kolom created_at / updated_at

    protected $fillable = [
        'users_id',
        'judul',
        'pesan',
        // 'tanggal',
    ];

    /**
     * Relasi ke user (pengirim aduan)
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
