<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\umkm; // Import model UMKM
use App\Models\SektorUsaha; // Import model UMKM

class UMKMController extends Controller
{
    // Metode untuk menampilkan formulir pendaftaran UMKM
    public function index()
    {
        $sektor=SektorUsaha::all();
        return view('register', compact('sektor')); // Ganti 'registration_form' dengan nama blade view formulir registrasi Anda
    }

    // Metode untuk menyimpan data UMKM yang didaftarkan
    public function create(Request $request)
    {
        // Validasi data yang masuk

$request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kodepos' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            // 'id_sektor' => 'required|string|max:255',
            
            // 'password' => 'required|string|max:255',
            // 'nama_pemilik' => 'required|string|max:255',
]);
// $hashedPassword = Hash::make($request->password);
$umkm = new umkm;
$umkm->nama = $request->nama;
$umkm->alamat = $request->alamat;
$umkm->desa = $request->desa;
$umkm->kecamatan = $request->kecamatan;
$umkm->kodepos = $request->kodepos;
$umkm->whatsapp = $request->whatsapp;
$umkm->id_sektor_usaha = $request->id_sektor_usaha;
$umkm->save();
if($umkm->save())
{
    return redirect('/register')->with('success', 'Pendaftaran UMKM berhasil!');
}
else{
    return redirect('/register')->with('gagal', 'Pendaftaran UMKM gagal!');
}
       
    }
}
