<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\umkm; // Import model KONTAK
use App\Models\produk; // Import model KONTAK
use App\Models\beranda; // Import model KONTAK
use App\Models\kontak; // Import model KONTAK
use App\Models\BentukUsaha;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use Illuminate\Support\Facades\Auth;


class umkmDashboardController extends Controller
{
    public function index()
    {

        $dataBeranda = beranda::get();
        $dataProduk = Produk::with('umkm')->get();
        $title = 'beranda';


        // Kirim data ke view admin.konten
        return view('umkm.index', compact('dataBeranda', 'dataProduk', 'title'));
        //
    }
    public function profil()
    {
        $umkm = Auth::user()->umkm;
        return view('umkm.profil', compact('umkm'));
    }
   
}
