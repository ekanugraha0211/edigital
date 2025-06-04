<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
// Admin
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminAduanController;
use App\Http\Controllers\AdminUmkmController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminBantuanController;
use App\Http\Controllers\AdminPermintaanController;
use App\Http\Controllers\AdminUserController;
// Konsumen
use App\Http\Controllers\KonsumenDashboardController;
use App\Http\Controllers\KonsumenProdukController;
use App\Http\Controllers\KonsumenUmkmController;
use App\Http\Controllers\KonsumenAduanController;
use App\Http\Controllers\KonsumenPesananController;
use App\Http\Controllers\KonsumenRiwayatController;

// Umkm
use App\Http\Controllers\UmkmAduanController;
use App\Http\Controllers\UmkmDashboardController;
use App\Http\Controllers\UmkmProdukController;
use App\Http\Controllers\UmkmProfilController;
use App\Http\Controllers\UmkmProdukSayaController;
use App\Http\Controllers\UmkmUmkmController;
use App\Http\Controllers\UmkmPesananController;
use App\Http\Controllers\UmkmRiwayatController;

// use App\Http\Controllers\custUmkmController;
// use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;



Route::get('/', [BerandaController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::resource('/listumkm', UmkmController::class);
Route::GET('/register', [RegisterController::class, 'index']);
// Route::get('/sektor/{sektor}', [ProdukSektorController::class, 'index'])->name('produk.sektor');
Route::get('/bantuan', [BantuanController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/aduan', function () {
    return view('aduan', ["title" => "aduan"]);
});
// Route::post('/kontak/input', [KontakController::class, 'create']);
Route::post('/register/umkm-input', [RegisterController::class, 'registerUMKM']); 
Route::post('/register/konsumen-input', [RegisterController::class, 'registerKonsumen']);



Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [adminDashboardController::class, 'index']);
    Route::resource('adminProduk', AdminProdukController::class, );
    Route::post('adminProduk/{umkm_id}/store', [AdminProdukController::class, 'store'])->name('adminProduk.store');
    Route::get('/adminaduan', [adminAduanController::class, 'index']);
    Route::delete('/adminaduan/{id}', [adminAduanController::class, 'destroy'])->name('aduan.delete');
    Route::resource('/adminBantuan', adminBantuanController::class);
    // Route::put('/adminBantuan/updateAll', [BantuanController::class, 'updateAll'])->name('adminBantuan.updateAll');
    Route::resource('/adminUmkm', adminUmkmController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/permintaan', AdminPermintaanController::class);
});
Route::middleware(['konsumen'])->group(function () {
    Route::get('/konsumen', [KonsumenDashboardController::class, 'index']);
    Route::resource('/konsumen/produk', KonsumenProdukController::class);
    Route::resource('/konsumen/aduan', KonsumenAduanController::class );
    Route::resource('/konsumen/Umkm', KonsumenUmkmController::class);
    Route::resource('/konsumen/pesanan', KonsumenPesananController::class);
    Route::resource('/konsumen/riwayat', KonsumenRiwayatController::class);
});
Route::middleware(['umkm'])->group(function () {
    Route::get('/umkm', [umkmDashboardController::class, 'index']);
    Route::resource('/umkmprofil', UmkmProfilController::class);
    Route::resource('/daftarumkm', umkmUmkmController::class);
    Route::resource('/produksaya', UmkmProdukSayaController::class);
    Route::patch('/pesanan/{id}/status', [UmkmPesananController::class, 'updateStatus'])->name('pesanan.status.update');
    Route::resource('/umkmpesanan', UmkmPesananController::class);
    Route::resource('/umkmriwayat', UmkmRiwayatController::class);
    Route::resource('/umkmaduan', UmkmAduanController::class );
    Route::get('/umkmproduk', [UmkmProdukController::class, 'index']);
    Route::get('/umkm{produk}', [UmkmProdukController::class, 'show'])->name('umkm.produkdetail');

});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/{produk}', [ProdukController::class, 'show'])->name('produkdetail');


