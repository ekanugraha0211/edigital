<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\umkm;


class KonsumenUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Umkm::with(['SektorUsaha', 'BentukUsaha','SkalaUsaha']);

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where('nama_umkm', 'like', "%$search%")
              ->orWhere('alamat', 'like', "%$search%")
              ->orWhere('desa', 'like', "%$search%")
              ->orWhere('kodepos', 'like', "%$search%")
              ->orWhere('deskripsi', 'like', "%$search%");
    }
    $title = 'umkm';
    $umkm = $query->get();

    return view('konsumen.umkm', compact('umkm','title'));
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
        {
            $umkm = umkm::findOrFail($id);
            $title = 'UMKM';
    
            return view('konsumen.umkm_detail', compact( 'umkm','title'));
        }
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
