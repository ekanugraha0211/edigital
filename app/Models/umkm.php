<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $primaryKey = 'id';

    public $timestamps = false; // Tidak ada created_at dan updated_at di tabel

    protected $fillable = [
        'users_id',
        'nama_umkm',
        'akses_perbankan',
        'alamat',
        'desa',
        'deskripsi',
        'faksimili',
        'jumlah_karyawan_pria',
        'jumlah_karyawan_wanita',
        'kodepos',
        'logo',
        'no_surat_ijin',
        'NPWP',
        'website',
        'sektor_usaha_id',
        'bentuk_usaha_id',
        'skala_usaha_id',
    ];

    /**
     * Relasi ke user (pemilik akun)
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Relasi ke produk (UMKM memiliki banyak produk)
     */
    public function produk()
    {
        return $this->hasMany(Produk::class, 'umkm_id');
    }

    /**
     * Relasi ke sektor usaha
     */
    public function sektorUsaha()
    {
        return $this->belongsTo(SektorUsaha::class, 'sektor_usaha_id');
    }

    /**
     * Relasi ke bentuk usaha
     */
    public function bentukUsaha()
    {
        return $this->belongsTo(BentukUsaha::class, 'bentuk_usaha_id');
    }

    /**
     * Relasi ke skala usaha
     */
    public function skalaUsaha()
    {
        return $this->belongsTo(SkalaUsaha::class, 'skala_usaha_id');
    }
}
