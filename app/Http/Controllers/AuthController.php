<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ], [
            'nama.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $credentials = [
            'nama' => $request->nama,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['username' => $user->name]);
            session(['is_logged_in' => true]);
            session(['role' => $user->role]); // Simpan peran pengguna dalam sesi

            if ($user->role == 'admin') {
                return redirect('admin')->with('success', 'Login berhasil! Selamat datang, Admin.');
            } else if ($user->role == 'umkm') {
                return redirect('umkm')->with('success', 'Login berhasil! Selamat datang, UMKM.');
            }
        } else {
            return redirect('/login')->withErrors('Username atau Password yang Dimasukkan Tidak Sesuai')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('is_logged_in');
        $request->session()->forget('role'); // Hapus peran pengguna dari sesi
        return redirect('/')->with('success', 'Logout berhasil! Sampai jumpa lagi.');
    }
}
