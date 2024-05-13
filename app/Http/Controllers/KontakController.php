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
        ]);

        $kontak = new kontak;
        $kontak->nama = $request->nama;
        $kontak->subjek = $request->subjek;
        $kontak->email = $request->email;
        $kontak->pesan = $request->pesan;

        if($kontak->save()) {
            return redirect()->back()->with('success', 'Pesan berhasil Terkirim!');
        } else {
            return redirect()->back()->with('gagal', 'Pendaftaran KONTAK gagal!');
        }
    }
}
