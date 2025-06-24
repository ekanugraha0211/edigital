<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BentukUsaha;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use App\Models\UMKM;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UmkmProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();
    $umkm = $user->umkm;

    if (!$umkm) {
        return back()->with('error', 'UMKM tidak ditemukan.');
    }

    $produk = $umkm->produk;
    $skala = SkalaUsaha::all();
    $sektor = SektorUsaha::all();
    $bentuk = BentukUsaha::all();
    $title = 'beranda';

    return view("umkm.profil", compact("umkm","user", "produk", "skala", "sektor", "bentuk", "title"));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
{
    $user = Auth::user();
    // $user = User::with('umkm')->findOrFail($id); // ambil data UMKM sekaligus user-nya
    $skala = SkalaUsaha::all();
    $sektor = SektorUsaha::all();
    $bentuk = BentukUsaha::all();
    $title = 'beranda';

    return view('umkm.profil_edit', compact("user", "title", "skala", "sektor", "bentuk"));
}


    // Menyimpan hasil edit
    public function update(Request $request, $id)
{
    // $umkm = Umkm::findOrFail($id);
    $user = User::findOrFail(Auth::id());
    $umkm = $user->umkm;

    // Validasi input
    $request->validate([
        // Validasi data user
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' .  Auth::id(),
        'password' => 'nullable|string',

        // Validasi data UMKM
        'nama_umkm' => 'required|string|max:255',
        'alamat' => 'required|string',
        'desa' => 'required|string|max:100',
        'deskripsi' => 'nullable|string',
        'no_surat_ijin' => 'nullable|string|max:100',
        'NPWP' => 'nullable|string|max:100',
        'kodepos' => 'nullable|string|max:10',
        'akses_perbankan' => 'nullable|string|max:255',
        'faksimili' => 'nullable|string|max:255',
        'jumlah_karyawan_pria' => 'nullable|integer|min:0',
        'jumlah_karyawan_wanita' => 'nullable|integer|min:0',
        'website' => 'nullable|string|max:255',
        'logo' => 'nullable|image',
        'skala_usaha_id' => 'required|exists:skala_usaha,id',
        'sektor_usaha_id' => 'required|exists:sektor_usaha,id',
        'bentuk_usaha_id' => 'required|exists:bentuk_usaha,id',
    ]);

    // Update data user
    $user->nama = $request->nama;
    $user->email = $request->email;
    // if ($request->filled('password')) {
    //     $user->password = bcrypt($request->password);
    // }
    if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
    $user->save();

    // Handle upload logo jika ada
    $logoPath = $umkm->logo;
    if ($request->hasFile('logo')) {
        if ($logoPath) {
            Storage::disk('public')->delete($logoPath);
        }
        $logoPath = $request->file('logo')->store('logo_umkm', 'public');
    }

    // Update data UMKM
    $umkm->update([
        'nama_umkm' => $request->nama_umkm,
        'alamat' => $request->alamat,
        'desa' => $request->desa,
        'deskripsi' => $request->deskripsi,
        'no_surat_ijin' => $request->no_surat_ijin,
        'NPWP' => $request->NPWP,
        'kodepos' => $request->kodepos,
        'akses_perbankan' => $request->akses_perbankan,
        'faksimili' => $request->faksimili,
        'jumlah_karyawan_pria' => $request->jumlah_karyawan_pria,
        'jumlah_karyawan_wanita' => $request->jumlah_karyawan_wanita,
        'website' => $request->website,
        'logo' => $logoPath,
        'skala_usaha_id' => $request->skala_usaha_id,
        'sektor_usaha_id' => $request->sektor_usaha_id,
        'bentuk_usaha_id' => $request->bentuk_usaha_id,
    ]);

    return redirect()->route('umkmprofil.index')->with('success', 'Profil UMKM berhasil diperbarui.');
}





    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
