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
            'deskripsi' => 'eDisplay bukan sekadar platform promosi online, namun juga sebuah jendela digital yang memperlihatkan kekayaan budaya Sumenep. Di sini, Anda dapat menjelajahi beragam produk unggulan yang tidak hanya mencerminkan kearifan lokal, tetapi juga mewakili tradisi yang diwariskan turun-temurun. Bergabunglah sekarang untuk merasakan perjalanan yang memperkaya wawasan tentang keindahan dan keistimewaan budaya Sumenep.',
            'foto' => 'assets/img/beranda/features-1.jpeg',
        ]);

        Beranda::create([
            'judul' => 'Lebih dari Sekadar Etalase.',
            'deskripsi' => 'Selamat datang di eDisplay, platform etalase digital inovatif yang menghadirkan kekayaan produk lokal dari Kabupaten Sumenep. Kami menghubungkan pengusaha lokal dengan konsumen yang mencari produk berkualitas, berfokus pada keberagaman budaya, kerajinan tangan, dan kuliner khas Sumenep. Temukan:
            - Kain batik tulis dengan motif khas Sumenep yang penuh makna dan keindahan.
            - Keris dan Ukiran, hasil karya tangan terampil pengrajin lokal.
            - Kuliner tradisional yang lezat dan autentik, memanjakan lidah dengan cita rasa khas Sumenep.',
            'foto' => 'assets/img/beranda/foto2.jpeg',
        ]);

        // Add more sample data as needed
    }
}
