<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bantuan;
class AdminBantuanController extends Controller
{
    public function index()
    {
        $bantuan = Bantuan::all();

        return view('admin.bantuan', compact('bantuan'));
        //
    }
    public function update(Request $request)
{
    // Validasi input
    $request->validate([
        'pertanyaan.*' => 'required|string|max:255',
        'jawaban.*' => 'required|string',
    ]);

    // Iterasi setiap entri yang diterima dari request
    foreach ($request->pertanyaan as $id => $pertanyaan) {
        // Cari entitas Bantuan berdasarkan ID
        $bantuan = Bantuan::findOrFail($id);

        // Update data produk
        $bantuan->pertanyaan = $pertanyaan;
        $bantuan->jawaban = $request->jawaban[$id];
        $bantuan->save();
    }

    // Redirect dengan pesan sukses
    return redirect()->route('adminBantuan.index')->with('success', 'Bantuan Berhasil Diedit');
}
public function updateAll(Request $request)
    {
        // Validasi input
        $request->validate([
            'pertanyaan.*' => 'required|string|max:255',
            'jawaban.*' => 'required|string',
        ]);

        // Iterasi setiap entri yang diterima dari request
        foreach ($request->ids as $id) {
            // Cari entitas Bantuan berdasarkan ID
            $bantuan = Bantuan::findOrFail($id);

            // Update data produk
            $bantuan->pertanyaan = $request->pertanyaan[$id];
            $bantuan->jawaban = $request->jawaban[$id];
            $bantuan->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('adminBantuan.index')->with('success', 'Bantuan Berhasil Diedit');
    }

}
