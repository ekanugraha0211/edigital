<?php

// Menyatakan namespace dari file controller ini, sesuai struktur folder Laravel
namespace App\Http\Controllers;

// Mengimpor kelas Request dari Laravel untuk menangani permintaan HTTP
use Illuminate\Http\Request;
// Mengimpor model Aduan agar bisa digunakan untuk mengakses data aduan dari database
use App\Models\Aduan;

// Mendefinisikan kelas controller untuk mengelola aduan oleh admin
class AdminAduanController extends Controller
{
    // Method untuk menampilkan seluruh data aduan
    public function index()
    {
        // Mengambil semua data aduan dari tabel 'aduans'
        $aduan = Aduan::all();

        // Menentukan judul halaman (opsional, biasanya digunakan dalam view)
        $title = "aduan";

        // Mengembalikan view 'admin.aduan' dengan mengirimkan data aduan dan title ke view
        return view('admin.aduan', compact('aduan', 'title'));

    }

    // Method untuk menghapus aduan berdasarkan ID-nya
    public function destroy($id)
    {
        // Mencari data aduan berdasarkan ID, jika tidak ditemukan maka akan menampilkan error 404
        $aduan = Aduan::findOrFail($id);

        // Menghapus data aduan dari database
        $aduan->delete();

        // Mengarahkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan aduan berhasil dihapus.');
    }
}
