<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;


class UmkmPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pesanan = Pesanan::with(['produk.umkm', 'users'])
    ->whereIn('status',['pending','proses'])
    ->whereHas('produk.umkm', function ($query) {
        $query->where('users_id', Auth::id());
    })
    ->latest()
    ->get();


    $title = 'produk';

    return view('umkm.pesanan', compact('pesanan', 'title'));
}


public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:proses,selesai,pending',
    ]);

    $pesanan = Pesanan::findOrFail($id);
    $pesanan->status = $request->status;
    $pesanan->save();

    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
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
