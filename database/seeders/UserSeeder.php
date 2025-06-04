<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\User;
// use App\Models\users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => 'approved'
        ]);

        // Buat UMKM Owner
        User::create([
            'nama' => 'UMKM Owner',
            'email' => 'umkm@example.com',
            'password' => bcrypt('password'),
            'role' => 'umkm',
            'status' => 'pending'
        ]);
        User::create([
            'nama' => 'Konsumen',
            'email' => 'konsumen@example.com',
            'password' => bcrypt('password'),
            'role' => 'konsumen',
            'status' => 'approved'
        ]);



        // Tambahkan pengguna lainnya sesuai kebutuhan
    }
}
