<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk= produk::get();
        $title = 'produk';
        return view('produk', compact('produk','title'));
        //
    }
    // public function show($id)
    // {
    //     // Mengambil data produk berdasarkan ID
    //     $produk = produk::findOrFail($id);
    //     $title = 'produk';

    //     // Menampilkan view detail produk dan mengirim data produk
    //     return view('produk_detail', compact('produk','title'));
    // }
}
