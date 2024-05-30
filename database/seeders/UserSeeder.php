<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ],
        [
            'name' => 'UMKM Owner',
            'email' => 'umkm@example.com',
            'password' => bcrypt('password'),
            'role' => 'umkm',
        ]);


        // Tambahkan pengguna lainnya sesuai kebutuhan
    }
}
