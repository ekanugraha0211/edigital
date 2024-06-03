<?php

namespace App\Http\Controllers;

use App\Models\SektorUsaha;
use Illuminate\Http\Request;

class Sektor extends Controller
{
    public function index()
    {
        $sektor= SektorUsaha::get();
        $title = 'sektor';
        return view('main', compact('sektor','title'));
        //
    }
}
