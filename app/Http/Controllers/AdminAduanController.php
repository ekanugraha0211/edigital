<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aduan;
class AdminAduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        // $user = Auth::user();
        $title = "aduan";
        return view('admin.aduan', compact('aduan','title'));
        //
    }
    public function destroy($id)
{
    $aduan = Aduan::findOrFail($id);
    $aduan->delete();
    return redirect()->back()->with('success', 'Pesan aduan berhasil dihapus.');

}

}
