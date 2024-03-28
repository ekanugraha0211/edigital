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
            // 'nomor_surat_ijin' => 'string|max:255',
            // 'logo' => 'string|max:255',
            'alamat' => 'required|string|max:255',
            // 'desa' => 'required|string|max:255',
            // 'kecamatan' => 'required|string|max:255',
            // 'kodepos' => 'required|string|max:10',
            // 'no_telp_kantor' => 'required|string|max:20',
            // 'faksimili' => 'string|max:255',
            // 'website' => 'string|max:255',
            'email' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            // 'tgl_mulai' => 'required|date',
            // 'NPWP' => 'string|max:255',
            // 'status' => 'string|max:255',
            // 'id_sektor_usaha' => 'required|integer|max:11',
            // 'id_skala_usaha' => 'required|integer|max:11',
            // 'jumlah_karyawan_pria' => 'required|string|max:10',
            // 'jumlah_karyawan_wanita' => 'required|string|max:10',
            'nama_pemilik' => 'required|string|max:255',
            // 'modal_awal' => 'required|string|max:255',
            // 'omset' => 'required|string|max:255',
            // 'id_bentuk_usaha' => 'required|int',
]);
$hashedPassword = Hash::make($request->password);
$umkm = new umkm;
$umkm->nama = $request->nama;
$umkm->alamat = $request->alamat;
$umkm->email = $request->email;
$umkm->whatsapp = $request->whatsapp;
$umkm->password = $hashedPassword;
$umkm->nama_pemilik = $request->nama_pemilik;
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
