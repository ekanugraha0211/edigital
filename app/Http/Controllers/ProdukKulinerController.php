<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukKulinerController extends Controller
{
    public function index()
    {
        $produk = Produk::with('umkm')->paginate(10);
        $title = 'kuliner';
        return view('produk_kuliner', compact('produk','title'));
        //
    }
    
}
