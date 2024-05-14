<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $produk=Produk::with('umkm')->get();
    
            return view('admin.produk', compact('produk'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $produk = Produk::all();
        $umkm = umkm::all();
        return view('admin.produkadd',compact('umkm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'tagline' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'foto1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'id_umkm' => 'required|integer|exists:umkm,id',
    ]);

    // Simpan foto1
    $foto1Path = null;
    if ($request->hasFile('foto1')) {
        $foto1Path = $request->file('foto1')->storeAs('public/assets/img/produk', $request->file('foto1')->getClientOriginalName());
    }

    // Simpan foto2
    $foto2Path = null;
    if ($request->hasFile('foto2')) {
        $foto2Path = $request->file('foto2')->storeAs('public/assets/img/produk', $request->file('foto2')->getClientOriginalName());
    }

    // Simpan foto3
    $foto3Path = null;
    if ($request->hasFile('foto3')) {
        $foto3Path = $request->file('foto3')->storeAs('public/assets/img/produk', $request->file('foto3')->getClientOriginalName());
    }

    // Buat produk baru
    $produk = Produk::create([
        'nama_produk' => $request->nama_produk,
        'tagline' => $request->tagline,
        'deskripsi' => $request->deskripsi,
        'foto1' => $foto1Path,
        'foto2' => $foto2Path,
        'foto3' => $foto3Path,
        'id_umkm' => $request->id_umkm
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
