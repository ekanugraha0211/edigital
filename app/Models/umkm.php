<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $fillable = ['users_id', 'nama_umkm', 'deskripsi','nomor_surat_ijin','logo', 'alamat', 'desa','kecamatan','kodepos','whatsapp','faksimili', 'email', 'website','NPWP','jumlah_karyawan_pria','jumlah_karyawan_wanita','akses_perbankan','modal_awal','omset','users_id', 'sektor_usaha_id', 'skala_usaha_id', 'bentuk_usaha_id'];

    public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}

    public function sektorUsaha()
    {
        return $this->belongsTo(SektorUsaha::class, 'sektor_usaha_id');
    }

    public function skalaUsaha()
    {
        return $this->belongsTo(SkalaUsaha::class, 'skala_usaha_id');
    }

    public function bentukUsaha()
    {
        return $this->belongsTo(BentukUsaha::class, 'bentuk_usaha_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'umkm_id');
    }
}
