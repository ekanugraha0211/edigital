<?php

namespace App\Http\Controllers;
use App\Models\user; // Import model UMKM


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::with('umkm')->get();
        return view('admin.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        // 'role' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Buat produk baru
    $user = user::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'role' => 'guest',
    ]);

    // return redirect('User.index')->with('success', 'Produk Berhasil Ditambahkan');
    return redirect()->route('User.index')->with('success', 'User Berhasil Ditambahkan');
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


        return view('admin.useredit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $user = user::findOrFail($id);
    // $umkm = $produk->umkm; 

   

    // Update data produk
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->role = $request->role;


    $user->update();

    return redirect()->route('User.edit', $id)->with('success', 'User Berhasil Diedit');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
