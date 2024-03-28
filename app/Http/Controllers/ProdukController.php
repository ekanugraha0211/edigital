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
    public function show(produk $produk)
    {
        $title = 'produk';
        return view('produk_detail',['produk' => $produk, 'title' => $title]);
    }
}
