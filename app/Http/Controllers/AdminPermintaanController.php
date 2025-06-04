<?php

namespace App\Http\Controllers;
use App\Models\User; // Import model UMKM


use Illuminate\Http\Request;

class AdminPermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = User::with('umkm')
                ->where('role', 'umkm')
                ->where('status', 'pending')
                ->get();
    $title = 'permintaan';

    return view('admin.permintaan', compact('user', 'title'));
}



    public function create()
    {
        $user = user::with('umkm')->get();
        return view('admin.Useradd', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = user::all();
    // $umkm = $produk->umkm; 
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        // 'role' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Buat produk baru
    $user = user::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => $request->password,
        'role' => 'umkm',
    ]);

    // return redirect('User.index')->with('success', 'Produk Berhasil Ditambahkan');
    return redirect()->route('user.index')->with('success', 'User Berhasil Ditambahkan');
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
        $user = user::findOrFail($id);


        return view('admin.Useredit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->role = $request->role;

    if (!empty($request->password)) {
        $user->password = bcrypt($request->password); // Aman
    }

    if (!empty($request->status)) {
        $user->status = $request->status;
    }

    $user->save();

    return redirect()->route('user.permintaan')->with('success', 'User Berhasil Diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        // $umkm = $produk->umkm;
        $user->delete();

        return redirect()->route('user.permintaan')->with('success', 'Layanan Berhasil Dihapus');
    }
}
