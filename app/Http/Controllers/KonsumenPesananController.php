<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;


class KonsumenPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pesanan = Pesanan::with(['produk.umkm'])
        ->where('users_id', Auth::id())
        ->where('status',['pending','proses'])
        ->latest()
        ->get();
    $title= 'produk';

    // Kirim ke view
    return view('konsumen.pesanan', compact('pesanan', 'title'));
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
    // Validasi data masukan
    $validated = $request->validate([
        'produk_id'    => 'required|exists:produk,id',
        'alamat'       => 'required|string',
        'whatsapp'       => 'required|string',
        'jumlah'       => 'required|integer|min:1',
        'catatan'      => 'nullable|string',
    ]);

    // Buat instance baru dari model Pesanan
    $pesanan = new Pesanan();
    $pesanan->produk_id = $validated['produk_id'];
    $pesanan->alamat    = $validated['alamat'];
    $pesanan->whatsapp    = $validated['whatsapp'];
    $pesanan->jumlah    = $validated['jumlah'];
    $pesanan->catatan   = $validated['catatan'] ?? null;
    $pesanan->status    = 'pending'; // default status

    // Simpan konsumen_id jika user login
    if (Auth::check()) {
        $pesanan->users_id = Auth::id(); // asumsi pengguna yang login adalah konsumen
    }

    $pesanan->save();

    return redirect()->back()->with('success', 'Pesanan berhasil dikirim!');
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
