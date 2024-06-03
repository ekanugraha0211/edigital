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
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['username' => $user->name]);
            session(['is_logged_in' => true]);
            session(['role' => $user->role]); // Simpan peran pengguna dalam sesi

            if ($user->role == 'admin') {
                return redirect('admin');
            } else if ($user->role == 'umkm') {
                return redirect('umkm');
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
        return redirect('/');
    }
}
