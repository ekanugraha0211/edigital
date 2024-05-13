<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kontak;
class adminKontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        // $kontak = Kontak::all();

        // Kirim data ke view admin.konten
        return view('admin.kontak', compact('kontak'));
        //
    }
}
