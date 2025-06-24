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
    /**
     * Menampilkan halaman registrasi dengan data referensi skala, sektor, dan bentuk usaha
     */
    public function index()
    {
        // Ambil semua data referensi untuk dropdown
        $skala = SkalaUsaha::all();
        $sektor = SektorUsaha::all();
        $bentuk = BentukUsaha::all();

        // Kirim data ke view 'register'
        return view('register', compact('skala','sektor', 'bentuk'));
    }

    /**
     * Menangani proses registrasi UMKM
     */
    public function registerUMKM(Request $request)
    {
        // Validasi input dari form UMKM
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nama_umkm' => 'required|string|max:255',
            'akses_perbankan' => 'required|in:Ya,Tidak',
            'alamat' => 'required|string',
            'desa' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlah_karyawan_pria' => 'required|integer|min:0',
            'jumlah_karyawan_wanita' => 'required|integer|min:0',
            'sektor_usaha_id' => 'required|exists:sektor_usaha,id',
            'bentuk_usaha_id' => 'required|exists:bentuk_usaha,id',
            'skala_usaha_id' => 'required|exists:skala_usaha,id',
        ], [
            // Pesan error kustom untuk setiap validasi
            'nama.required' => 'Nama pemilik wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'nama_umkm.required' => 'Nama UMKM wajib diisi.',
            'akses_perbankan.required' => 'Akses perbankan wajib dipilih.',
            'akses_perbankan.in' => 'Akses perbankan harus bernilai Ya atau Tidak.',
            'alamat.required' => 'Alamat wajib diisi.',
            'desa.required' => 'Desa wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'jumlah_karyawan_pria.required' => 'Jumlah karyawan pria wajib diisi.',
            'jumlah_karyawan_pria.integer' => 'Jumlah karyawan pria harus berupa angka.',
            'jumlah_karyawan_pria.min' => 'Jumlah karyawan pria minimal 0.',
            'jumlah_karyawan_wanita.required' => 'Jumlah karyawan wanita wajib diisi.',
            'jumlah_karyawan_wanita.integer' => 'Jumlah karyawan wanita harus berupa angka.',
            'jumlah_karyawan_wanita.min' => 'Jumlah karyawan wanita minimal 0.',
            'sektor_usaha_id.required' => 'Sektor usaha wajib dipilih.',
            'sektor_usaha_id.exists' => 'Sektor usaha tidak valid.',
            'bentuk_usaha_id.required' => 'Bentuk usaha wajib dipilih.',
            'bentuk_usaha_id.exists' => 'Bentuk usaha tidak valid.',
            'skala_usaha_id.required' => 'Skala usaha wajib dipilih.',
            'skala_usaha_id.exists' => 'Skala usaha tidak valid.',
        ]);

        DB::beginTransaction(); // Mulai transaksi database

        try {
            // Simpan data user ke tabel users
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'role' => 'umkm',
                'status' => 'pending' // Akun UMKM butuh persetujuan admin
            ]);

            // Simpan data UMKM yang terkait dengan user yang baru dibuat
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
                'logo' => $request->file('logo') ? $request->file('logo')->store('logo', 'public') : null, // Upload logo ke storage
                'no_surat_ijin' => $request->no_surat_ijin,
                'npwp' => $request->npwp,
                'website' => $request->website,
                'sektor_usaha_id' => $request->sektor_usaha_id,
                'bentuk_usaha_id' => $request->bentuk_usaha_id,
                'skala_usaha_id' => $request->skala_usaha_id,
            ]);

            DB::commit(); // Commit transaksi jika semua berhasil

            // Redirect ke halaman login dengan pesan sukses
            return redirect('/login')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan semua perubahan jika terjadi error

            // Kembali ke halaman sebelumnya dengan input yang sudah diisi dan pesan error
            return back()
                ->withInput()
                ->with('form_type', 'umkm')
                ->with('error', 'Registrasi gagal: ' . $e->getMessage());
        }
    }

    /**
     * Menangani proses registrasi Konsumen
     */
    public function registerKonsumen(Request $request)
    {
        // Validasi input dari form konsumen
        $request->validate([
            'nama_konsumen' => 'required|string|max:255',
            'email_konsumen' => 'required|email|unique:users,email',
            'password_konsumen' => 'required|min:6',
            'alamat' => 'required|string',
            'whatsapp' => 'required|string|min:10',
        ], [
            // Pesan validasi kustom
            'nama_konsumen.required' => 'Nama konsumen wajib diisi.',
            'email_konsumen.required' => 'Email wajib diisi.',
            'email_konsumen.email' => 'Format email tidak valid.',
            'email_konsumen.unique' => 'Email ini sudah digunakan.',
            'password_konsumen.required' => 'Password wajib diisi.',
            'password_konsumen.min' => 'Password minimal 6 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.min' => 'Nomor WhatsApp minimal 10 digit.',
        ]);

        // Flash form_type agar tab konsumen tetap aktif saat terjadi error
        session()->flash('form_type', 'konsumen');

        // Simpan data user untuk konsumen
        $user = User::create([
            'nama' => $request->nama_konsumen,
            'email' => $request->email_konsumen,
            'password' => Hash::make($request->password_konsumen),
            'role' => 'konsumen',
            'status' => 'approved' // Konsumen langsung disetujui
        ]);

        // Simpan data tambahan ke tabel konsumen
        Konsumen::create([
            'users_id' => $user->id,
            'alamat' => $request->alamat,
            'whatsapp' => $request->whatsapp,
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect('/login')->with('success', 'Pendaftaran konsumen berhasil! Silakan login.');
    }
}
