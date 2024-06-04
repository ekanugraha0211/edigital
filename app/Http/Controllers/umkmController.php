<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\umkm; // Import model UMKM

class UMKMController extends Controller
{
    // Metode untuk menampilkan formulir pendaftaran UMKM
    public function showRegistrationForm()
    {
        return view('register'); // Ganti 'registration_form' dengan nama blade view formulir registrasi Anda
    }

    // Metode untuk menyimpan data UMKM yang didaftarkan
    public function create(Request $request)
    {
        // Validasi data yang masuk

$request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            // 'email' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            // 'password' => 'required|string|max:255',
            // 'nama_pemilik' => 'required|string|max:255',
]);
$hashedPassword = Hash::make($request->password);
$umkm = new umkm;
$umkm->nama = $request->nama;
$umkm->alamat = $request->alamat;
// $umkm->email = $request->email;
$umkm->whatsapp = $request->whatsapp;
// $umkm->password = $hashedPassword;
// $umkm->nama_pemilik = $request->nama_pemilik;
$umkm->save();
if($umkm->save())
{
    return redirect('/')->with('success', 'Pendaftaran UMKM berhasil!');
}
else{
    return redirect('/register')->with('gagal', 'Pendaftaran UMKM gagal!');
}
       

        // Redirect ke halaman berhasil atau tampilkan pesan sukses
    }
}
