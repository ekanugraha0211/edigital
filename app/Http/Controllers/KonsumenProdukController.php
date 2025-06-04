<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\umkm;


class KonsumenProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $title = 'produk';

    $produk = Produk::with('umkm');

    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $produk->where(function($query) use ($searchTerm) {
            $query->where('nama_produk', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('umkm', function($query) use ($searchTerm) {
                      $query->where('nama', 'like', '%' . $searchTerm . '%')
                            ->orWhere('alamat', 'like', '%' . $searchTerm . '%')
                            ->orWhere('desa', 'like', '%' . $searchTerm . '%')
                            ->orWhere('kecamatan', 'like', '%' . $searchTerm . '%');
                  });
        });
    }


    $produk = $produk->paginate(12);

    return view('konsumen.produk', compact('produk', 'title'));
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
    //  public function show(string $id)
    // {
    //     {
    //         $umkm = umkm::findOrFail($id);
    //         $produk= $umkm->produk;
    
    //         return view('konsumen.produk', compact('produk', 'umkm'));
    //     }
    // }
    public function show(produk $produk)
    {
        $title = 'produk';
        return view('konsumen.produk_detail',['produk' => $produk, 'title' => $title]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
