<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\sektor_usaha;
use App\Models\SektorUsaha;

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
        SektorUsaha::create([
            'nama' => 'Kreatif'
        ]);
        SektorUsaha::create([
            'nama' => 'Pakaian'
        ]);
        SektorUsaha::create([
            'nama' => 'Jasa'
        ]);
        SektorUsaha::create([
            'nama' => 'Pertanian'
        ]);
        SektorUsaha::create([
            'nama' => 'Teknologi'
        ]);
        SektorUsaha::create([
            'nama' => 'Pendidikan'
        ]);
        SektorUsaha::create([
            'nama' => 'Kesehatan'
        ]);
        SektorUsaha::create([
            'nama' => 'Transportasi'
        ]);
        SektorUsaha::create([
            'nama' => 'Properti'
        ]);
        SektorUsaha::create([
            'nama' => 'Kuliner'
        ]);
        SektorUsaha::create([
            'nama' => 'Perikanan'
        ]);

        

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
