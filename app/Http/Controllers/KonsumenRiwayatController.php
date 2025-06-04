<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;




class KonsumenRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pesanan = Pesanan::with(['produk.umkm'])
        ->where('users_id', Auth::id())
        ->where('status','selesai')
        ->latest()
        ->get();
    $title= 'produk';

    // Kirim ke view
    return view('konsumen.riwayat', compact('pesanan', 'title'));
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
