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

Route::get('/', [BerandaController::class, 'index'],function(){});
Route::get('/produk', [ProdukController::class, 'index'],function(){});
Route::get('/sektor/{sektor}', [ProdukSektorController::class, 'index'])->name('produk.sektor');
// Route::get('/kriya/{id_sektor_usaha}', [ProdukKriyaController::class, 'index'])->name('produk.index');
Route::get('/bantuan',[BantuanController::class, 'index'], function () {});
Route::get('/login', function () {
    
    return view('login',);
});
Route::get('/register', function () {
    
    return view('register',);
});
Route::get('/admin', [adminDashboardController::class, 'index']);
Route::get('/adminkontak', [adminKontakController::class, 'index']);
// Route::get('/adminBantuan', [adminBantuanController::class, 'index']);
Route::resource('/adminBantuan', adminBantuanController::class);
// routes/web.php
Route::put('/adminBantuan/updateAll', [BantuanController::class, 'updateAll'])->name('adminBantuan.updateAll');

Route::resource('/adminUmkm', adminUmkmController::class);
// Route::get('/produkedit{produkedit}', [AdminProdukController::class,'show'])->name('produkedit');
Route::get('/adProduk', [adminProdukController::class, 'index'])->name('adProduk');
// Route::post('/produkupdate',[adminProdukController::class, 'upload'])->name('upload');

Route::get('/kontak', function () {
    return view('contact',[
        "title" => "kontak"
    ]);
});
Route::POST('/kontak/input', [KontakController::class, 'create']);
//produk
Route::get('/{produk}', [ProdukController::class, 'show'])->name('produkdetail');
Route::POST('/register/input', [UMKMController::class, 'create']);
Route::resource('/adminProduk', BaruController::class);


