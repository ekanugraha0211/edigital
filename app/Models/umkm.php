<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class umkm extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'umkm'; // Ganti 'nama_tabel_beranda' dengan nama tabel Anda

    protected $fillable = ['nama', 'nomor_surat_ijin', 'logo','role', 'alamat', 'desa', 'kecamatan', 'kodepos', 'no_telp_kantor', 'faksimili', 'website', 'whatsapp', 'tgl_mulai', 'NPWP', 'id_sektor_usaha', 'id_skala_usaha', 'jumlah_karyawan_pria','jumlah_karyawan_wanita', 'akses_perbankan', 'modal_awal', 'omset','id_bentuk usaha', 'id_users'];
    public function produks()
    {
        return $this->hasMany(produk::class, 'id_umkm');
    }
    public function BentukUsaha()
    {
        return $this->belongsTo(BentukUsaha::class, 'id_bentuk_usaha');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function SektorUsaha()
    {
        return $this->belongsTo(SektorUsaha::class, 'id_sektor_usaha');
    }

    public function SkalaUsaha()
    {
        return $this->belongsTo(SkalaUsaha::class, 'id_skala_usaha');
    }
}
