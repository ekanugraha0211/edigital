<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class UmkmSektorController extends Controller
{
    public function index(Request $request, $sektor)
    {
        $title = ucfirst($sektor);
        $produk = Produk::with('umkm')
            ->whereHas('umkm.sektorUsaha', function ($query) use ($sektor) {
                $query->where('nama', $sektor);
            });

        if ($request->has('search') && $request->search != '') {
            $produk->where(function($query) use ($request) {
                $query->where('nama_produk', 'like', '%' . $request->search . '%')
                      ->orWhere('tagline', 'like', '%' . $request->search . '%')
                      ->orWhere('deskripsi', 'like', '%' . $request->search . '%')
                      ->orWhereHas('umkm', function($query) use ($request) {
                          $query->where('nama', 'like', '%' . $request->search . '%')
                                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                                ->orWhere('desa', 'like', '%' . $request->search . '%')
                                ->orWhere('kecamatan', 'like', '%' . $request->search . '%');
                      });
            });
        }
        
        

        $produk = $produk->paginate(9);

        return view('umkm.produkSektor.index', compact('produk', 'title', 'sektor'));
    }
}