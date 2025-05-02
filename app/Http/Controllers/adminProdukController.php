<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\umkm;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(string $id)
    {
        {
            $umkm = umkm::findOrFail($id);
            $produk= $umkm->produk;
    
            return view('admin.produk', compact('produk', 'umkm'));
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
        'umkm_id' => 'required|exists:umkm,id',
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
        'gambar_produk.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $produk = Produk::create([
        'umkm_id' => $request->input('umkm_id'),
        'nama' => $request->input('nama'),
        'deskripsi' => $request->input('deskripsi'),
        'stok' => $request->input('stok'),
        'harga' => $request->input('harga')
    ]);

    if ($request->hasFile('gambar_produk')) {
        foreach ($request->file('gambar_produk') as $file) {
            $destinationPath = 'assets/img/produk';
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file ke dalam direktori
            $file->move(public_path($destinationPath), $fileName);
    
            // Simpan path gambar dalam tabel gambar_produk
            $produk->gambarProduk()->create(['path_gambar' => $destinationPath . '/' . $fileName]);
        }
    }
    
    

    return redirect()->route('adminProduk.show', $request->input('umkm_id'))->with('success', 'Produk berhasil ditambahkan!');
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
        $file = $request->file('foto1');
        $path = $file->store('public/assets/img/produk');
        $produk->foto1 = str_replace('public/', 'storage/', $path);
    }

    // Update foto2
    if ($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $path = $file->store('public/assets/img/produk');
        $produk->foto2 = str_replace('public/', 'storage/', $path);
    }

    // Update foto3
    if ($request->hasFile('foto3')) {
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

    return redirect()->route('adminProduk.edit', $id)->with('success', 'Produk Berhasil Diedit');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = produk::findOrFail($id);
        $umkm = $produk->umkm;
        $produk->delete();

        return redirect()->route('adProduk')->with('success', 'Layanan Berhasil Diedit');
    }
    public function deleteData(Request $request, $id) {
        $produk = Produk::findOrFail($id);
        $produk->delete();
    
        return redirect()->route('/adProduk')->with('success', 'Layanan Berhasil Dihapus');
    }
    
}
