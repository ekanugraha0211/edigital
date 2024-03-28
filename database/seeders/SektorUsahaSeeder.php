<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\sektor_usaha;

class SektorUsahaSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk memasukkan data contoh.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk tabel bantuan
        sektor_usaha::create([
            'nama' => 'Kreatif'
        ]);
        sektor_usaha::create([
            'nama' => 'Pakaian'
        ]);
        sektor_usaha::create([
            'nama' => 'Jasa'
        ]);
        sektor_usaha::create([
            'nama' => 'Pertanian'
        ]);
        sektor_usaha::create([
            'nama' => 'Teknologi'
        ]);
        sektor_usaha::create([
            'nama' => 'Pendidikan'
        ]);
        sektor_usaha::create([
            'nama' => 'Kesehatan'
        ]);
        sektor_usaha::create([
            'nama' => 'Transportasi'
        ]);
        sektor_usaha::create([
            'nama' => 'Properti'
        ]);
        sektor_usaha::create([
            'nama' => 'Kuliner'
        ]);

        

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
