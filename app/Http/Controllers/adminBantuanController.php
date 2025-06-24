<?php

// Namespace sesuai struktur folder Laravel
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel
use Illuminate\Http\Request;
// Mengimpor model Bantuan agar bisa mengakses data bantuan di database
use App\Models\Bantuan;

// Mendefinisikan controller untuk mengelola data bantuan oleh admin
class AdminBantuanController extends Controller
{
    // Method untuk menampilkan semua data bantuan
    public function index()
    {
        // Mengambil semua data bantuan dari database
        $bantuan = Bantuan::all();

        // Mengembalikan view 'admin.bantuan' sambil mengirim data bantuan
        return view('admin.bantuan', compact('bantuan'));

        // Catatan: tanda "//" di sini tidak digunakan dan bisa dihapus
    }

    // Method untuk mengupdate data bantuan secara satu per satu (berdasarkan ID array key)
    public function update(Request $request)
    {
        // Validasi input: pastikan setiap pertanyaan dan jawaban tidak kosong
        $request->validate([
            'pertanyaan.*' => 'required|string|max:255', // validasi array pertanyaan
            'jawaban.*' => 'required|string',            // validasi array jawaban
        ]);

        // Iterasi setiap pertanyaan berdasarkan ID sebagai key array
        foreach ($request->pertanyaan as $id => $pertanyaan) {
            // Cari data bantuan berdasarkan ID, error 404 jika tidak ditemukan
            $bantuan = Bantuan::findOrFail($id);

            // Update data pertanyaan dan jawaban
            $bantuan->pertanyaan = $pertanyaan;
            $bantuan->jawaban = $request->jawaban[$id];
            $bantuan->save(); // Simpan perubahan
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('adminBantuan.index')->with('success', 'Bantuan Berhasil Diedit');
    }

    // Method alternatif untuk mengupdate bantuan menggunakan array ID eksplisit dari input
    public function updateAll(Request $request)
    {
        // Validasi input (sama seperti sebelumnya)
        $request->validate([
            'pertanyaan.*' => 'required|string|max:255',
            'jawaban.*' => 'required|string',
        ]);

        // Iterasi berdasarkan array 'ids' yang dikirim dari form
        foreach ($request->ids as $id) {
            // Cari bantuan berdasarkan ID
            $bantuan = Bantuan::findOrFail($id);

            // Update data bantuan berdasarkan ID
            $bantuan->pertanyaan = $request->pertanyaan[$id];
            $bantuan->jawaban = $request->jawaban[$id];
            $bantuan->save(); // Simpan perubahan
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('adminBantuan.index')->with('success', 'Bantuan Berhasil Diedit');
    }
}
