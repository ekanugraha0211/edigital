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
    public function index()
{
    $user = Auth::user();
    $umkm = $user->umkm;

    if (!$umkm) {
        return back()->with('error', 'UMKM tidak ditemukan.');
    }

    $produk = $umkm->produk;
    $skala = SkalaUsaha::all();
    $sektor = SektorUsaha::all();
    $bentuk = BentukUsaha::all();
    $title = 'beranda';

    return view("umkm.profil", compact("umkm","user", "produk", "skala", "sektor", "bentuk", "title"));
}


}
