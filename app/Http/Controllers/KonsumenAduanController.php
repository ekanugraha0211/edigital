<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class KonsumenAduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Aduan::all();
        $user = Auth::user();
        $title = "aduan";
        return view('konsumen.aduan', compact('kontak','user','title'));
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
    $request->validate([
        // 'name'    => 'required|string|max:255',
        // 'email'   => 'required|email',
        'judul' => 'required|string|max:255',
        'pesan' => 'required|string',
    ]);

    // Simpan ke database
    Aduan::create([
        // 'name'    => $request->name,
        // 'email'   => $request->email,
        'judul' => $request->judul,
        'pesan' => $request->pesan,
        'users_id' => Auth::id()
    ]);

    return redirect()->route('aduan.index')->with('success', 'Pesan Anda berhasil dikirim!');
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
