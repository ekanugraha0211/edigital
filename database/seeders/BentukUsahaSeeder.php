<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\bentuk_usaha;

class BentukUsahaSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk memasukkan data contoh.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk tabel bantuan
        bentuk_usaha::create([
            'nama' => 'Badan Usaha Milik Negara (BUMN)'
        ]);
        bentuk_usaha::create([
            'nama' => 'Badan Usaha Milik Daerah (BUMD)'
        ]);
        bentuk_usaha::create([
            'nama' => 'Perseorangan Terbatas (PT)'
        ]);
        bentuk_usaha::create([
            'nama' => 'Firma'
        ]);
        bentuk_usaha::create([
            'nama' => 'Commanditaire Vennootschap (CV)'
        ]);
        bentuk_usaha::create([
            'nama' => 'Koperasi'
        ]);

        

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
