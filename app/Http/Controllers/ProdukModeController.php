<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukModeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('umkm')->paginate(10);
        $title = 'mode';
        return view('produk_mode', compact('produk','title'));
        //
    }
    
}
