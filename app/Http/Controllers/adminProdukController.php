<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\umkm;
// use App\Models\SektorUsaha;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        // Mengambil data produk bersama dengan semua data terkait
        $produk = Produk::with('umkm.SektorUsaha', 'umkm.SkalaUsaha')->get();

        // Mengirim data ke view
        return view('admin.produk', compact('produk'));
    }
}
