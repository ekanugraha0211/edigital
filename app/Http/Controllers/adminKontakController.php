<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kontak;
class AdminKontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        return view('admin.kontak', compact('kontak'));
        //
    }
}
