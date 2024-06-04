<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
// use App\Http\Controllers\ProdukKulinerController;
use App\Http\Controllers\ProdukSektorController;
// use App\Http\Controllers\ProdukKriyaController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\umkmController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\adminKontakController;
use App\Http\Controllers\adminUmkmController;
use App\Http\Controllers\adminProdukController;
use App\Http\Controllers\adminBantuanController;
use App\Http\Controllers\BaruController;
use App\Http\Controllers\custDashboardController;
use App\Http\Controllers\custProdukController;
use App\Http\Controllers\custUmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', [BerandaController::class, 'index'],function(){});
Route::get('/produk', [ProdukController::class, 'index'],function(){});
Route::get('/sektor/{sektor}', [ProdukSektorController::class, 'index'])->name('produk.sektor');
Route::get('/bantuan', [BantuanController::class, 'index'],function(){});
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('register');
});
Route::get('/kontak', function () {
    return view('contact', ["title" => "kontak"]);
});
Route::post('/kontak/input', [KontakController::class, 'create']);
Route::post('/register/input', [UMKMController::class, 'create']);

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [adminDashboardController::class, 'index']);
    Route::resource('/adminProduk', BaruController::class);
    Route::get('/adProduk', [adminProdukController::class, 'index'])->name('adProduk');
    Route::get('/adminkontak', [adminKontakController::class, 'index']);
    Route::resource('/adminBantuan', adminBantuanController::class);
    Route::put('/adminBantuan/updateAll', [BantuanController::class, 'updateAll'])->name('adminBantuan.updateAll');
    Route::resource('/adminUmkm', adminUmkmController::class);
    Route::resource('/User', UserController::class);
});
Route::middleware(['umkm'])->group(function () {
    Route::get('/umkm', [custDashboardController::class, 'index']);
    // Route::get('/custProduk', [custProdukController::class, 'index']);
    Route::resource('/custProduk', custProdukController::class);
    Route::resource('/custUmkm', custUmkmController::class);


});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/{produk}', [ProdukController::class, 'show'])->name('produkdetail');


