<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\umkm; // Import model KONTAK
use App\Models\produk; // Import model KONTAK
use App\Models\kontak; // Import model KONTAK
use App\Models\BentukUsaha;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $umkm = Umkm::all();
        $produk = Produk::all();
        $kontak = Kontak::all();
        $skala = SkalaUsaha::all();
        $sektor = SektorUsaha::all();
        $bentuk = BentukUsaha::all();
        $user = user::all();
        // $kontak = Kontak::all();

        // Kirim data ke view admin.konten
        return view('admin.konten', compact('umkm', 'produk', 'kontak','skala','sektor','bentuk','user'));
        //
    }
   
}
