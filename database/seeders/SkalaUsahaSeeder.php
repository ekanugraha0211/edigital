<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\skala_usaha;

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
        skala_usaha::create([
            'nama' => 'Mikro'
        ]);
        skala_usaha::create([
            'nama' => 'Makro'
        ]);
        skala_usaha::create([
            'nama' => 'Menengah'
        ]);




        

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
