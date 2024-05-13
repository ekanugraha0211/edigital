<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\umkm;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produkedit = Produk::with('umkm')->get();
         // Ambil data produk berdasarkan ID
        return view('admin.produk', ['produk'=>$produkedit]);
    }


}
