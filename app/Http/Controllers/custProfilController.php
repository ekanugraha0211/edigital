<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\umkm; // Import model KONTAK
use App\Models\kontak; // Import model KONTAK
use App\Models\BentukUsaha;
use App\Models\SektorUsaha;
use App\Models\SkalaUsaha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustProfilController extends Controller
{
    public function index($id)
{
    $umkm = umkm::findOrfail($id);
    $produk = $umkm->produk; // Pastikan relasi hasMany antara Umkm dan Produk
    $skala = SkalaUsaha::all();
    $sektor = SektorUsaha::all();
    $bentuk = BentukUsaha::all();
    $title = 'beranda';

    return view("umkm.profil", compact("umkm", "produk", "skala", "sektor", "bentuk", "title"));
}

}
