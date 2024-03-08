<?php

namespace App\Http\Controllers;

use App\Models\beranda;
use App\Http\Requests\StoreberandaRequest;
use App\Http\Requests\UpdateberandaRequest;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= beranda::get();
        $title = 'beranda';
        return view('index', compact('data','title'));
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
    public function store(StoreberandaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(beranda $beranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(beranda $beranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateberandaRequest $request, beranda $beranda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(beranda $beranda)
    {
        //
    }
}