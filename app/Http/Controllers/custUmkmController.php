<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\umkm;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use App\Models\BentukUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class custUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // $umkm = Auth::user()->umkm;
        $umkm = umkm::findOrFail($id);
        $sektor = SektorUsaha::all();
        $skala = SkalaUsaha::all();
        $bentuk = BentukUsaha::all();


        // $urlImg = $produk->foto1 ? Storage::url($produk->foto1) : null;

        return view('customer.umkmedit', compact('umkm','sektor','skala','bentuk'));
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

    // Update data UMKM
    $umkm->nama = $request->nama;
    $umkm->nomor_surat_ijin = $request->nomor_surat_ijin;
    $umkm->alamat = $request->alamat;
    $umkm->desa = $request->desa;
    $umkm->kecamatan = $request->kecamatan;
    $umkm->kodepos = $request->kodepos;
    $umkm->no_telp_kantor = $request->no_telp_kantor;
    $umkm->faksimili = $request->faksimili;
    $umkm->website = $request->website;
    $umkm->whatsapp = $request->whatsapp;
    $umkm->tgl_mulai = $request->tgl_mulai;
    $umkm->NPWP = $request->NPWP;
    $umkm->id_sektor_usaha = $request->id_sektor_usaha;
    $umkm->id_skala_usaha = $request->id_skala_usaha;
    $umkm->jumlah_karyawan_pria = $request->jumlah_karyawan_pria;
    $umkm->jumlah_karyawan_wanita = $request->jumlah_karyawan_wanita;
    $umkm->akses_perbankan = $request->akses_perbankan;
    $umkm->modal_awal = $request->modal_awal;
    $umkm->omset = $request->omset;
    $umkm->id_bentuk_usaha = $request->id_bentuk_usaha;
    // $umkm->id_user = $request->id_user;

    $umkm->update();

    return redirect()->route('custUmkm.edit', $id)->with('success', 'UMKM Berhasil Diedit');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
