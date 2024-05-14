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
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_surat_ijin' => 'string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kodepos' => 'required|string|max:10',
            'no_telp_kantor' => 'required|string|max:20',
            'faksimili' => 'string|max:255',
            'website' => 'string|max:255',
            'email' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'NPWP' => 'string|max:255',
            'status' => 'string|max:255',
            'id_sektor_usaha' => 'required|integer|max:11',
            'id_skala_usaha' => 'required|integer|max:11',
            'jumlah_karyawan_pria' => 'required|string|max:10',
            'jumlah_karyawan_wanita' => 'required|string|max:10',
            'nama_pemilik' => 'required|string|max:255',
            'modal_awal' => 'required|string|max:255',
            'omset' => 'required|string|max:255',
            'id_bentuk_usaha' => 'required|int'
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->storeAs('public\assets\img\produk', $request->file('logo')->getClientOriginalName());
        }

        $umkm = umkm::create([
            'nama_produk' => $request->nama,
            'nomor_surat_ijin' => $request->nomor_surat_ijin,
            'logo' => $request->logo,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kodepos' => $request->kodepos,
            'no_telp_kantor' => $request->no_telp_kantor,
            'faksimili' => $request->faksimili,
            'website' => $request->website,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'password' => $request->password,
            'tgl_mulai' => $request->tgl_mulai,
            'NPWP' => $request->NPWP,
            'status' => $request->status,
            'id_sektor_usaha' => $request->id_sektor_usaha,
            'id_skala_usaha' => $request->id_skala_usaha,
            'jumlah_karyawan_pria' => $request->jumlah_karyawan_pria,
            'jumlah_karyawan_wanita' => $request->jumlah_karyawan_wanita,
            'nama_pemilik' => $request->nama_pemilik,
            'akses_perbankan' => $request->akses_perbankan,
            'modal_awal' => $request->modal_awal,
            'omset' => $request->omset,
            'id_bentuk_usaha' => $request->id_bentuk_usaha

        ]);

        return redirect('adminUmkm.index')->with('success', 'Layanan Berhasil Ditambahkan');
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

    // $umkm = $produk->umkm; 

    // Update foto1
    if ($request->hasFile('logo')) {
        // Hapus file lama jika ada
        // if ($produk->foto1) {
        //     Storage::delete($produk->foto1);
        // }

        $file = $request->file('logo');
        $path = $file->store('public/assets/img/produk');
        $umkm->logo = str_replace('public/', 'storage/', $path);
    }

    

    // Update data produk
    $umkm->nama = $request->nama;
$umkm->nomor_surat_ijin = $request->nomor_surat_ijin;
$umkm->logo = $request->logo;
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
$umkm->status = $request->status;
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

    return redirect()->route('adminUmkm.edit', $id)->with('success', 'Layanan Berhasil Diedit');
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
    
        return redirect()->route('/adProduk')->with('success', 'Layanan Berhasil Dihapus');
    }
    
}

