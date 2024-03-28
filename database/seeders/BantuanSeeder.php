<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\bantuan;

class BantuanSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk memasukkan data contoh.
     *
     * @return void
     */
    public function run()
    {
        // Data contoh untuk tabel bantuan
        Bantuan::create([
            'pertanyaan' => 'Apa itu eDisplay ?',
            'jawaban' => 'eDisplay adalah salah satu layanan yang disediakan oleh dinas komunikasi dan informatika Kabupaten Sumenep untuk masyarakat dengan tujuan memberikan informasi kepada individu yang membutuhkan produk serta untuk memberikan dukungan dan bantuan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) di Sumenep.',
        ]);

        Bantuan::create([
            'pertanyaan' => 'Apa tujuan eDisplay ?',
            'jawaban' => 'Tujuan utama dari website ini adalah untuk memberikan dukungan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) di Sumenep agar dapat berkembang, bersaing, dan maju sehingga dapat memberikan kontribusi positif dalam meningkatkan perekonomian Sumenep. Selain itu, website ini juga bertujuan untuk memperkenalkan kepada masyarakat luar potensi yang ada di Kabupaten Sumenep.',
        ]);
        Bantuan::create([
            'pertanyaan' => 'Siapa saja yang menggunakan eDisplay ?',
            'jawaban' => 'Yang bisa mengakses eDisplay adalah para pelaku UMKM di Sumenep dengan cara mendaftarkan diri dan menempatkan produk-produk mereka di platform ini.',
        ]);
        Bantuan::create([
            'pertanyaan' => 'Apakah eDisplay berbayar ?',
            'jawaban' => 'eDisplay didesain untuk memberikan bantuan kepada masyarakat tanpa memungut biaya apa pun.',
        ]);
        Bantuan::create([
            'pertanyaan' => 'Bagaiaman cara user menggunakan eDisplay ?',
            'jawaban' => 'Langkah penggunaan eDisplay bagi para pelaku UMKM melibatkan proses pendaftaran melalui Kominfo, yang mencakup penyerahan informasi terkait nama produk dan detail lainnya. Setelah pendaftaran selesai, pengguna dapat mengunggah produk mereka ke platform, memungkinkan pengguna lain untuk menemukan dan menjelajahi produk tersebut di eDisplay.',
        ]);

        // Tambahkan data contoh lainnya sesuai kebutuhan
    }
}
