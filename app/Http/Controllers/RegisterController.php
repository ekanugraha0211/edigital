<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UMKM;
use App\Models\Konsumen;        
use App\Models\SkalaUsaha;
use App\Models\SektorUsaha;
use App\Models\BentukUsaha;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        $skala = SkalaUsaha::all();
        $sektor = SektorUsaha::all();
        $bentuk = BentukUsaha::all();
        return view('register', compact('skala','sektor', 'bentuk')); // Ganti 'registration_form' dengan nama blade view formulir registrasi Anda
    }

    public function registerUMKM(Request $request)
{
    DB::beginTransaction();

    try {
        $user = User::create([
            'nama' => $request->nama, // Pastikan name inputnya benar
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'umkm',
            'status' => 'pending'
        ]);

        UMKM::create([
            'users_id' => $user->id,
            'nama_umkm' => $request->nama_umkm,
            'akses_perbankan' => $request->akses_perbankan,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'deskripsi' => $request->deskripsi,
            'faksimili' => $request->faksimili,
            'jumlah_karyawan_pria' => $request->jumlah_karyawan_pria,
            'jumlah_karyawan_wanita' => $request->jumlah_karyawan_wanita,
            'kodepos' => $request->kodepos,
            'logo' => $request->file('logo') ? $request->file('logo')->store('logo', 'public') : null,
            'no_surat_ijin' => $request->no_surat_ijin,
            'npwp' => $request->npwp,
            'website' => $request->website,
            'sektor_usaha_id' => $request->sektor_usaha_id,
            'bentuk_usaha_id' => $request->bentuk_usaha_id,
            'skala_usaha_id' => $request->skala_usaha_id,
        ]);

        DB::commit();

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error', 'Registrasi gagal: ' . $e->getMessage());
    }
}

    public function registerKonsumen(Request $request)
{
    $request->validate([
        'nama_konsumen' => 'required|string|max:255',
        'email_konsumen' => 'required|email|unique:users,email',
        'password_konsumen' => 'required|min:6',
        'alamat' => 'required|string',
        'no_hp' => 'required|string',
    ]); 

    // Simpan ke tabel users
    $user = User::create([
        'nama' => $request->nama_konsumen,
        'email' => $request->email_konsumen,
        'password' => Hash::make($request->password_konsumen),
        'role' => 'konsumen',
        'status' => 'approved'
    ]);

    // Simpan ke tabel konsumen
    Konsumen::create([
        'users_id' => $user->id,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
    ]);

    return redirect('/login')->with('success', 'Pendaftaran konsumen berhasil! Silakan login.');
}
}
