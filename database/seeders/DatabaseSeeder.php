<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BantuanSeeder::class,
            BentukUsahaSeeder::class,
            BerandaSeeder::class,
            SektorUsahaSeeder::class,
            SkalaUsahaSeeder::class,
            // Tambahkan seeder lain di sini jika diperlukan
        ]);
    }
}
