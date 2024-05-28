<?php

namespace App\Http\Controllers;
// use App\Models\Produk;
use App\Models\umkm;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use App\Models\BentukUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class adminUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $umkm = Umkm::with('skalaUsaha', 'sektorUsaha', 'bentukUsaha')->get();
        return view('admin.umkm', compact('umkm'));
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
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'nomor_surat_ijin' => 'nullable|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'alamat' => 'nullable|string|max:255',
        'desa' => 'nullable|string|max:255',
        'kecamatan' => 'nullable|string|max:255',
        'kodepos' => 'nullable|string|max:10',
        'no_telp_kantor' => 'nullable|string|max:20',
        'faksimili' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'whatsapp' => 'nullable|string|max:255',
        'password' => 'required|string|max:255',
        'tgl_mulai' => 'nullable|date',
        'NPWP' => 'nullable|string|max:255',
        'status' => 'nullable|string|max:255',
        'id_sektor_usaha' => 'required|integer|exists:sektor_usaha,id',
        'id_skala_usaha' => 'required|integer|exists:skala_usaha,id',
        'jumlah_karyawan_pria' => 'nullable|string|max:10',
        'jumlah_karyawan_wanita' => 'nullable|string|max:10',
        'nama_pemilik' => 'nullable|string|max:255',
        'modal_awal' => 'nullable|string|max:255',
        'omset' => 'nullable|string|max:255',
        'id_bentuk_usaha' => 'required|integer|exists:bentuk_usaha,id'
    ]);

    // Inisialisasi path logo
    $logoPath = null;

    // Simpan logo jika ada
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $path = $file->store('public/assets/img/produk/logo');
        $logoPath = str_replace('public/', 'storage/', $path);
    }

    // Buat umkm baru
    $umkm = Umkm::create([
        'nama' => $request->nama,
        'nomor_surat_ijin' => $request->nomor_surat_ijin,
        'logo' => $logoPath,
        'alamat' => $request->alamat,
        'desa' => $request->desa,
        'kecamatan' => $request->kecamatan,
        'kodepos' => $request->kodepos,
        'no_telp_kantor' => $request->no_telp_kantor,
        'faksimili' => $request->faksimili,
        'website' => $request->website,
        'email' => $request->email,
        'whatsapp' => $request->whatsapp,
        'password' => bcrypt($request->password), // Enkripsi password
        'tgl_mulai' => $request->tgl_mulai,
        'NPWP' => $request->NPWP,
        'status' => $request->status,
        'id_sektor_usaha' => $request->id_sektor_usaha,
        'id_skala_usaha' => $request->id_skala_usaha,
        'jumlah_karyawan_pria' => $request->jumlah_karyawan_pria,
        'jumlah_karyawan_wanita' => $request->jumlah_karyawan_wanita,
        'nama_pemilik' => $request->nama_pemilik,
        'modal_awal' => $request->modal_awal,
        'omset' => $request->omset,
        'id_bentuk_usaha' => $request->id_bentuk_usaha,
        'akses_perbankan' => $request->akses_perbankan
    ]);

    return redirect()->route('adminUmkm.index')->with('success', 'UMKM Berhasil Ditambahkan');
}


    /**
     * Display the specified resource.
     */
    // public function show()
    // {
    //     $produk = Produk::all();
    //     return view('home', compact('produk'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $umkm = umkm::findOrFail($id);
        // $umkm = umkm::all();
        $sektor = SektorUsaha::all();
        $skala = SkalaUsaha::all();
        $bentuk = BentukUsaha::all();
        // $umkm = umkm::all();

        $urlImg = $umkm->logo ? Storage::url($umkm->logo) : null;

        return view('admin.umkmedit', compact('umkm','sektor','skala','bentuk','urlImg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $umkm = umkm::findOrFail($id);

    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $path = $file->store('public/assets/img/produk/logo');
        $umkm->logo = str_replace('public/', 'storage/', $path);
    }


    

    // Update data produk
    $umkm->nama = $request->nama;
$umkm->nomor_surat_ijin = $request->nomor_surat_ijin;
// $umkm->logo = $request->logo;
$umkm->alamat = $request->alamat;
$umkm->desa = $request->desa;
$umkm->kecamatan = $request->kecamatan;
$umkm->kodepos = $request->kodepos;
$umkm->no_telp_kantor = $request->no_telp_kantor;
$umkm->faksimili = $request->faksimili;
$umkm->website = $request->website;
$umkm->email = $request->email;
$umkm->whatsapp = $request->whatsapp;
$umkm->password = $request->password;
$umkm->tgl_mulai = $request->tgl_mulai;
$umkm->NPWP = $request->NPWP;
// $umkm->status = $request->status;
$umkm->status = $request->input('status') == 'on' ? 'Aktif' : 'Nonaktif';
$umkm->id_sektor_usaha = $request->id_sektor_usaha;
$umkm->id_skala_usaha = $request->id_skala_usaha;
$umkm->jumlah_karyawan_pria = $request->jumlah_karyawan_pria;
$umkm->jumlah_karyawan_wanita = $request->jumlah_karyawan_wanita;
$umkm->nama_pemilik = $request->nama_pemilik;
$umkm->akses_perbankan = $request->akses_perbankan;
$umkm->modal_awal = $request->modal_awal;
$umkm->omset = $request->omset;
$umkm->id_bentuk_usaha = $request->id_bentuk_usaha;


    $umkm->update();

    return redirect()->route('adminUmkm.edit', $id)->with('success', 'UMKM Berhasil Diedit');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $umkm = umkm::findOrFail($id);
        // $umkm = $produk->umkm;


        // if ($produk->foto1) {
        //     Storage::delete($produk->foto1);
        // }

        $umkm->delete();

        return redirect()->route('adminUmkm.index')->with('success', 'Layanan Berhasil Diedit');
    }
    public function deleteData(Request $request, $id) {
        // Lakukan validasi dan otorisasi di sini, pastikan pengguna memiliki izin untuk menghapus data.
    
        $umkm = umkm::findOrFail($id);
        $umkm->delete();
    
        return redirect()->route('/adProduk')->with('success', 'UMKM Berhasil Dihapus');
    }
    
}

