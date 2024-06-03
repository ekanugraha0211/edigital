<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\umkm; // Import model KONTAK
use App\Models\produk; // Import model KONTAK
use App\Models\kontak; // Import model KONTAK
use App\Models\BentukUsaha;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use Illuminate\Support\Facades\Auth;


class custDashboardController extends Controller
{
    public function index()
    {

        $umkm = Umkm::all();
        $produk = Auth::user()->Produk;
        $kontak = Kontak::all();
        $skala = SkalaUsaha::all();
        $sektor = SektorUsaha::all();
        $bentuk = BentukUsaha::all();
        // $kontak = Kontak::all();

        // Kirim data ke view admin.konten
        return view('customer.konten', compact('umkm', 'produk', 'kontak','skala','sektor','bentuk'));
        //
    }
   
}
