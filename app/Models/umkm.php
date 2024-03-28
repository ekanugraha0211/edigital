<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['nama', 'nomor_surat_ijin', 'logo', 'alamat', 'desa', 'kecamatan', 'kodepos', 'no_telp_kantor', 'faksimili', 'website', 'email', 'whatsapp', 'password', 'tgl_mulai', 'NPWP', 'status', 'id_sektor_usaha', 'id_skala_usaha', 'jumlah_karyawan_pria','jumlah_karyawan_wanita','nama_pemilik', 'akses_perbankan', 'modal_awal', 'omset','id_bentuk usaha'];
    public function produks()
    {
        return $this->hasMany(produk::class, 'id_umkm');
    }
    public function bentukUsaha()
    {
        return $this->belongsTo(bentuk_usaha::class, 'id_bentuk_usaha');
    }

    public function sektorUsaha()
    {
        return $this->belongsTo(sektor_usaha::class, 'id_sektor_usaha');
    }

    public function skalaUsaha()
    {
        return $this->belongsTo(skala_usaha::class, 'id_skala_usaha');
    }
}
