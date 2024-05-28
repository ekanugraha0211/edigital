<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\SektorUsaha;
use Illuminate\Http\Request;

class ProdukKriyaController extends Controller
{
    public function index($id_sektor_usaha)
    {
        // Ambil data berdasarkan id_sektor_usaha
        $sektor = SektorUsaha::findOrFail($id_sektor_usaha);
        // $produk = produk::all();
        $produks = Produk::whereHas('umkm', function($query) use ($id_sektor_usaha) {
            $query->where('id_sektor_usaha', $id_sektor_usaha);
        })->get();

        // Pass data ke view
        return view('produk_kreatif', compact('sektor','produks'));
    }
}

