<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\beranda;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for beranda table
        Beranda::create([
            'judul' => 'Temukan Pesona Budaya, Kerajinan Tangan, dan Kuliner Sumenep di eDisplay.',
            'deskripsi' => 'eDisplay hadir sebagai etalase digital inovatif yang mempersembahkan kekayaan produk lokal dari Kabupaten Sumenep. Platform ini didesain untuk menghubungkan pengusaha lokal dengan konsumen yang mencari produk berkualitas, dengan fokus pada keberagaman budaya, kerajinan tangan, dan kuliner khas Sumenep.
            - Jelajahi: Beragam produk budaya, kerajinan, dan kuliner khas Sumenep.
            - Temukan: Pengusaha lokal yang berdedikasi dan produk-produk berkualitas.
            - Dukung: UMKM Sumenep dan lestarikan kekayaan budaya lokal.',
            'foto' => 'assets/img/beranda/features-2.jpg',
        ]);

        Beranda::create([
            'judul' => 'Lebih dari Sekadar Etalase.',
            'deskripsi' => 'eDisplay bukan hanya platform promosi online, tetapi juga jendela digital yang membuka wawasan tentang kekayaan budaya Sumenep. Jelajahi berbagai produk unggulan yang mencerminkan kearifan lokal dan tradisi yang diwariskan turun-temurun.
            Temukan:
            - Kain batik tulis dengan motif khas Sumenep yang penuh makna dan keindahan.
            - Keris dan Ukiran, hasil karya tangan terampil pengrajin lokal.
            - Kuliner tradisional yang lezat dan autentik, memanjakan lidah dengan cita rasa khas Sumenep.',
            'foto' => 'assets/img/beranda/features-2.jpg',
        ]);

        // Add more sample data as needed
    }
}
