<?php

namespace App\Http\Controllers;
// use App\Models\Produk;
use App\Models\umkm;
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
        // $produk = Produk::all();
        $umkm = umkm::all();
        return view('admin.umkmadd',compact('umkm'));
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

        return redirect('adProduk')->with('success', 'Layanan Berhasil Ditambahkan');
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
        $produk = Produk::findOrFail($id);
        $umkm = umkm::all();

        $urlImg = $produk->foto1 ? Storage::url($produk->foto1) : null;

        return view('admin.produkedit', compact('produk','umkm','urlImg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);
    $umkm = $produk->umkm; 

    // Update foto1
    if ($request->hasFile('foto1')) {
        // Hapus file lama jika ada
        // if ($produk->foto1) {
        //     Storage::delete($produk->foto1);
        // }

        $file = $request->file('foto1');
        $path = $file->store('public/assets/img/produk');
        $produk->foto1 = str_replace('public/', 'storage/', $path);
    }

    // Update foto2
    if ($request->hasFile('foto2')) {
        // Hapus file lama jika ada
        // if ($produk->foto2) {
        //     Storage::delete($produk->foto2);
        // }

        $file = $request->file('foto2');
        $path = $file->store('public/assets/img/produk');
        $produk->foto2 = str_replace('public/', 'storage/', $path);
    }

    // Update foto3
    if ($request->hasFile('foto3')) {
        // Hapus file lama jika ada
        // if ($produk->foto3) {
        //     Storage::delete($produk->foto3);
        // }

        $file = $request->file('foto3');
        $path = $file->store('public/assets/img/produk');
        $produk->foto3 = str_replace('public/', 'storage/', $path);
    }

    // Update data produk
    $produk->nama_produk = $request->nama_produk;
    $produk->tagline = $request->tagline;
    $produk->deskripsi = $request->deskripsi;
    $produk->id_umkm = $request->id_umkm;

    $produk->update();

    return redirect()->route('adminProduk.edit', $id)->with('success', 'Layanan Berhasil Diedit');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = produk::findOrFail($id);
        $umkm = $produk->umkm;


        // if ($produk->foto1) {
        //     Storage::delete($produk->foto1);
        // }

        $produk->delete();

        return redirect()->route('adProduk')->with('success', 'Layanan Berhasil Diedit');
    }
    public function deleteData(Request $request, $id) {
        // Lakukan validasi dan otorisasi di sini, pastikan pengguna memiliki izin untuk menghapus data.
    
        $produk = Produk::findOrFail($id);
        $produk->delete();
    
        return redirect()->route('/adProduk')->with('success', 'Layanan Berhasil Dihapus');
    }
    
}

