<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\umkm;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $produk=Produk::orderBy('created_at')->get();

        return view('admin.layanan.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link_layanan' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->storeAs('public/assets/images', $request->file('logo')->getClientOriginalName());
        }

        $layanan = Layanan::create([
            'name' => $request->name,
            'link_layanan' => $request->link_layanan,
            'logo' => $logoPath
        ]);

        return redirect('/admin/layanan')->with('success', 'Layanan Berhasil Ditambahkan');
    }

    public function show()
    {
        $layanans = Layanan::all();
        return view('home', compact('layanans'));
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        $urlImg = $layanan->logo ? Storage::url($layanan->logo) : null;

        return view('admin.layanan.edit', compact('layanan','urlImg'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link_layanan' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);

        if ($request->hasFile('logo')) {
            Storage::delete($layanan->logo);
            $logoPath = $request->file('logo')->storeAs('public/assets/images', $request->file('logo')->getClientOriginalName());
            $layanan->logo = $logoPath;
        }

        $layanan->name = $request->name;
        $layanan->link_layanan = $request->link_layanan;

        $layanan->update();

        return redirect('/admin/layanan')->with('success', 'Layanan Berhasil Diedit');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->logo) {
            Storage::delete($layanan->logo);
        }

        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

}