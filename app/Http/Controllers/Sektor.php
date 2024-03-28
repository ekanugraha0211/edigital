<?php

namespace App\Http\Controllers;

use App\Models\sektor_usaha;
use Illuminate\Http\Request;

class Sektor extends Controller
{
    public function index()
    {
        $sektor= sektor_usaha::get();
        $title = 'sektor';
        return view('main', compact('sektor','title'));
        //
    }
}
