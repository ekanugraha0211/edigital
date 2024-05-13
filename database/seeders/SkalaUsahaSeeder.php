<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\skala_usaha;
use App\Models\SkalaUsaha;

class SkalaUsahaSeeder extends Seeder
{  
    /**
     * Menjalankan seeder untuk memasukkan data contoh.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk tabel bantuan
        SkalaUsaha::create([
            'nama' => 'Mikro'
        ]);
        SkalaUsaha::create([
            'nama' => 'Makro'
        ]);
        SkalaUsaha::create([
            'nama' => 'Menengah'
        ]);




        

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
