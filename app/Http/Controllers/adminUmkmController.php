<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Models\User;
use App\Models\UMKM;
use App\Models\User;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use App\Models\BentukUsaha;

class adminUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkm = UMKM::with('User','SkalaUsaha', 'SektorUsaha', 'BentukUsaha')->get();
        $sektor = SektorUsaha::all();
        $skala = SkalaUsaha::all();
        $bentuk = BentukUsaha::all();
        $users = User::all();
        return view('admin.umkm', compact('umkm','users','sektor','skala', 'bentuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $umkm = umkm::all();
        $sektor = SektorUsaha::all();
        $skala = SkalaUsaha::all();
        $bentuk = BentukUsaha::all();
        return view('admin.umkmadd',compact('umkm','sektor','skala','bentuk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    DB::transaction(function () use ($request) {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nama_umkm' => 'required|string|max:255',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ], [
            'email.unique' => 'Email ini sudah terdaftar, silakan gunakan email lain.',
        ]);
    // Simpan data user
        $user = User::create([
            'nama' => $request->input('nama_user'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'umkm',
        ]);

        $logoPath = null;

        // Simpan logo jika ada
        if ($request->hasFile('logo')) {
            // Get the uploaded file
            $file = $request->file('logo');

            // Store the file in the 'public/assets/img/produk/logo' directory
            $path = $file->store('public/assets/img/produk/logo');

            // Change path to use the 'storage' URL format
            $logoPath = str_replace('public/', 'storage/', $path);
        }

        // Simpan data UMKM
        UMKM::create([
            'users_id' => $user->id,
            'nama_umkm' => $request->input('nama_umkm'),
            'logo' => $logoPath,  // Save the logo path, not the raw file input
            'alamat' => $request->input('alamat'),
            'desa' => $request->input('desa'),
            'kecamatan' => $request->input('kecamatan'),
            'kodepos' => $request->input('kodepos'),
            'faksimili' => $request->input('faksimili'),
            'website' => $request->input('website'),
            'whatsapp' => $request->input('whatsapp'),
            'nomor_surat_ijin' => $request->input('nomor_surat_ijin'),
            // 'tgl_mulai' => $request->input('tgl_mulai'),
            'NPWP' => $request->input('NPWP'),
            'jumlah_karyawan_pria' => $request->input('jumlah_karyawan_pria'),
            'jumlah_karyawan_wanita' => $request->input('jumlah_karyawan_wanita'),
            'akses_perbankan' => $request->input('akses_perbankan'),
            'modal_awal' => $request->input('modal_awal'),
            'omset' => $request->input('omset'),
            'bentuk_usaha_id' => $request->input('bentuk_usaha_id'),
            'sektor_usaha_id' => $request->input('sektor_usaha_id'),
            'skala_usaha_id' => $request->input('skala_usaha_id'),
        ]);
    });

    return redirect()->route('adminUmkm.index')->with('success', 'UMKM dan User berhasil ditambahkan.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $umkm = umkm::findOrFail($id);
    // Ambil data yang dibutuhkan untuk dropdown atau form lainnya
    $sektor = SektorUsaha::all();
    $skala = SkalaUsaha::all();
    $bentuk = BentukUsaha::all();
    $users = User::all();

    // Jika logo ada, ambil URL; jika tidak ada, beri nilai null
    $urlImg = $umkm->logo ? Storage::url($umkm->logo) : null;

    return view('admin.umkmedit', compact('umkm', 'sektor', 'users', 'skala', 'bentuk', 'urlImg'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $umkm = umkm::findOrFail($id);

    if ($umkm->user) {
        $user = $umkm->user;

        // Perbarui nama jika diberikan
        if (!is_null($request->nama)) {
            $user->nama = $request->nama;
        }

        // Perbarui email jika diberikan
        if (!is_null($request->user_email)) {
            $user->email = $request->user_email;
        }

        // Perbarui password jika diberikan
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->update();
    }

    // Perbarui logo jika file diunggah
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $path = $file->store('public/assets/img/produk/logo');
        $umkm->logo = str_replace('public/', 'storage/', $path);
    }

    // Perbarui atribut UMKM lainnya jika diberikan
    $fields = [
        'nama_umkm',
        'nomor_surat_ijin',
        'alamat',
        'desa',
        'kecamatan',
        'kodepos',
        'faksimili',
        'website',
        'whatsapp',
        'NPWP',
        'sektor_usaha_id',
        'skala_usaha_id',
        'jumlah_karyawan_pria',
        'jumlah_karyawan_wanita',
        'akses_perbankan',
        'modal_awal',
        'omset',
        'bentuk_usaha_id',
        'users_id',
    ];

    foreach ($fields as $field) {
        if (!is_null($request->$field)) {
            $umkm->$field = $request->$field;
        }
    }

    $umkm->update();

    return redirect()->back()->with('success', 'Edit UMKM berhasil!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    DB::transaction(function () use ($id) {
        // Cari UMKM berdasarkan ID
        $umkm = UMKM::findOrFail($id);

        // Hapus logo jika ada
        if ($umkm->logo) {
            $logoPath = public_path(str_replace('storage/', 'public/', $umkm->logo));
            if (file_exists($logoPath)) {
                unlink($logoPath); // Hapus file logo dari storage
            }
        }

        // Cari user yang terkait dengan UMKM
        $user = User::findOrFail($umkm->users_id);

        // Hapus data UMKM dan user
        $umkm->delete();
        $user->delete();
    });

    return redirect()->route('adminUmkm.index')->with('success', 'UMKM dan User berhasil dihapus.');
}

}
