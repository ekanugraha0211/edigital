<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\kontak; // Import model KONTAK

class KontakController extends Controller
{
    // Metode untuk menampilkan formulir pendaftaran KONTAK
    public function showKontakForm()
    {
        return view('contact'); // Ganti 'registration_form' dengan nama blade view formulir registrasi Anda
    }

    // Metode untuk menyimpan data KONTAK yang didaftarkan
    public function create(Request $request)
    {
        // Validasi data yang masuk

$request->validate([
            'nama' => 'required|string|max:255',
            'subjek' => 'required|string',
            'email' => 'required|string|max:255',
            'pesan' => 'required|string',
            // 'nomor_surat_ijin' => 'string|max:255',
            // 'logo' => 'string|max:255',
            // 'alamat' => 'required|string|max:255',
            // 'desa' => 'required|string|max:255',
            // 'kecamatan' => 'required|string|max:255',
            // 'kodepos' => 'required|string|max:10',
            // 'no_telp_kantor' => 'required|string|max:20',
            // 'faksimili' => 'string|max:255',
            // 'website' => 'string|max:255',
            // 'email' => 'required|string|max:255',
            // 'whatsapp' => 'required|string|max:255',
            // 'password' => 'required|string|max:255',
            // 'tgl_mulai' => 'required|date',
            // 'NPWP' => 'string|max:255',
            // 'status' => 'string|max:255',
            // 'id_sektor_usaha' => 'required|integer|max:11',
            // 'id_skala_usaha' => 'required|integer|max:11',
            // 'jumlah_karyawan_pria' => 'required|string|max:10',
            // 'jumlah_karyawan_wanita' => 'required|string|max:10',
            // 'nama_pemilik' => 'required|string|max:255',
            // 'modal_awal' => 'required|string|max:255',
            // 'omset' => 'required|string|max:255',
            // 'id_bentuk_usaha' => 'required|int',
]);
// $hashedPassword = Hash::make($request->password);
$kontak = new kontak;
$kontak->nama = $request->nama;
$kontak->subjek = $request->subjek;
$kontak->email = $request->email;
$kontak->pesan = $request->pesan;
$kontak->save();
if($kontak->save())
{
    return redirect('/')->with('success', 'Pendaftaran KONTAK berhasil!');
}
else{
    return redirect('/kontak')->with('gagal', 'Pendaftaran KONTAK gagal!');
}
       

        // Redirect ke halaman berhasil atau tampilkan pesan sukses
    }
}
