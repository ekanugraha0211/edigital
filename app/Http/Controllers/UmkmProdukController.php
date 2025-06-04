<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class UmkmProdukController extends Controller
{
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

    return view('umkm.produk', compact('produk', 'title'));
}

    public function show(produk $produk)
    {
        $title = 'produk';
        return view('umkm.produk_detail',['produk' => $produk, 'title' => $title]);
    }
}
