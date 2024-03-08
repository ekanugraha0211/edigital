<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukKriyaController extends Controller
{
    public function index()
    {
        $produk = Produk::with('umkm')->paginate(10);
        $title = 'kriya';
        return view('produk_kriya', compact('produk','title'));
        //
    }
    
}
