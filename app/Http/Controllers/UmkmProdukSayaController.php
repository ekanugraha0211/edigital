<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\produk;
use App\Models\GambarProduk;
use Illuminate\Support\Facades\Storage;



class UmkmProdukSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $title = 'produk';
    $user = Auth::user();
    $umkm = $user->umkm;
    $produk = $user->umkm->produk;


    if ($request->has('search') && $request->search != '') {
    $searchTerm = $request->search;
    $produk->where(function($query) use ($searchTerm) {
        $query->where('nama', 'like', '%' . $searchTerm . '%')
              ->orWhere('harga', 'like', '%' . $searchTerm . '%')
              ->orWhere('deskripsi', function($query) use ($searchTerm) {
                  $query->where('nama', 'like', '%' . $searchTerm . '%');
              });
    });
    }


    // $produk = $produk->paginate(12);

    return view('umkm.produk_saya', compact('produk','umkm' ,'title'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $umkm = $user->umkm;
        $produk = $user->umkm->produk;
        $title = 'produk';
        return view('umkm.produk_saya_add',compact('produk','title'));
    }

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        // 'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:8000',
    ]);

    $user = Auth::user();
    $umkmId = $user->umkm->id; // pastikan relasi umkm tersedia di model User

    // Simpan produk
    $produk = Produk::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'umkm_id' => $umkmId,
    ]);

    // Simpan gambar-gambar jika ada
    if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $file) {
            $path = $file->store('produk', 'public'); // simpan di storage/app/public/produk
            GambarProduk::create([
                'produk_id' => $produk->id,
                'path' => $path,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Produk berhasil disimpan.');

}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $user = Auth::user();
    $umkm = $user->umkm;

    // Pastikan produk milik UMKM pengguna yang sedang login
    $produk = $umkm->produk()->where('id', $id)->firstOrFail();

    $title = 'produk';

    return view('umkm.produk_saya_detail', compact('produk', 'umkm', 'title'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $produk = Produk::findOrFail($id);

    // Pastikan hanya UMKM pemilik produk yang bisa mengedit
    if (Auth::user()->umkm->id !== $produk->umkm_id) {
        abort(403);
    }

    $produk->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
    ]);

    // Tambah gambar baru jika ada
    if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $file) {
            $path = $file->store('produk', 'public');
            GambarProduk::create([
                'produk_id' => $produk->id,
                'path' => $path,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $produk = Produk::findOrFail($id);

    // Validasi: hanya UMKM milik user yang bisa menghapus produk ini
    if (auth()->user()->umkm->id !== $produk->umkm_id) {
        abort(403, 'Anda tidak memiliki akses untuk menghapus produk ini.');
    }

    // Hapus gambar terkait (jika ada)
    if ($produk->gambarProduk) {
        foreach ($produk->gambarProduk as $gambar) {
            Storage::delete($gambar->path); // hapus file dari storage
            $gambar->delete(); // hapus record dari DB
        }
    }

    $produk->delete(); // hapus produk dari database

    return redirect()->back()->with('success', 'Produk berhasil dihapus.');
}

    
}
