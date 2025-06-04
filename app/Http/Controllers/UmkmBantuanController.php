<?php

namespace App\Http\Controllers;

use App\Models\bantuan;
use App\Http\Requests\StorebantuanRequest;
use App\Http\Requests\UpdatebantuanRequest;

class UmkmBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= bantuan::get();
        $title = 'bantuan';
        return view('umkm.bantuan', compact('data','title'));
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
    public function store(StorebantuanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bantuan $bantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bantuan $bantuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebantuanRequest $request, bantuan $bantuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bantuan $bantuan)
    {
        //
    }
}
