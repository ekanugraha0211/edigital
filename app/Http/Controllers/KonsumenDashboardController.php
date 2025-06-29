<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\beranda;
use Illuminate\Http\Request;

class  KonsumenDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataBeranda = beranda::get();
        $dataProduk = Produk::with('umkm')->get();
        $title = 'beranda';


        // Kirim data ke view admin.konten
        return view('konsumen.index', compact('dataBeranda', 'dataProduk', 'title'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
