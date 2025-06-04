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
        session(['role' => $user->role]);
        session()->forget('login_attempts'); // Reset percobaan saat berhasil login

        if ($user->role == 'admin') {
            return redirect('admin')->with('success', 'Login berhasil! Selamat datang, Admin.');
        } 
        if ($user->role == 'konsumen') {
            return redirect('konsumen')->with('success', 'Login berhasil! Selamat datang, Konsumen.');
        } 
        else if ($user->role == 'umkm') {
            return redirect('umkm')->with('success', 'Login berhasil! Selamat datang, UMKM.');
        }
    } else {
        // Cek dan tambah jumlah percobaan gagal login
        $attempts = session()->get('login_attempts', 0) + 1;
        session()->put('login_attempts', $attempts);

        // Jika sudah 5 kali atau lebih
        if ($attempts >= 5) {
            return redirect('/login')->withErrors([
                'custom' => 'Anda telah gagal login 5 kali. Jika lupa password, silakan hubungi admin.'
            ])->withInput();
        }

        return redirect('/login')->withErrors([
            'custom' => 'Username atau Password yang Dimasukkan Tidak Sesuai'
        ])->withInput();
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