<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\bentuk_usaha;
use App\Models\BentukUsaha;

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
        BentukUsaha::create([
            'nama' => 'Badan Usaha Milik Negara (BUMN)'
        ]);
        BentukUsaha::create([
            'nama' => 'Badan Usaha Milik Daerah (BUMD)'
        ]);
        BentukUsaha::create([
            'nama' => 'Perseorangan Terbatas (PT)'
        ]);
        BentukUsaha::create([
            'nama' => 'Firma'
        ]);
        BentukUsaha::create([
            'nama' => 'Commanditaire Vennootschap (CV)'
        ]);
        BentukUsaha::create([
            'nama' => 'Koperasi'
        ]);

        

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
