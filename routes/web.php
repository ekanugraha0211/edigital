<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukKulinerController;
use App\Http\Controllers\ProdukModeController;
use App\Http\Controllers\ProdukKriyaController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\UMKMController;

Route::get('/', [BerandaController::class, 'index'],function(){});
Route::get('/produk', [ProdukController::class, 'index'],function(){});
Route::get('/kuliner',[ProdukKulinerController::class, 'index'], function () {});
Route::get('/mode',[ProdukModeController::class, 'index'], function () {});
Route::get('/kriya',[ProdukKriyaController::class, 'index'], function () {});
Route::get('/bantuan',[BantuanController::class, 'index'], function () {});
Route::get('/login', function () {
    
    return view('login',);
});
Route::get('/register', function () {
    
    return view('register',);
});
Route::get('/admin', function () {
    
    return view('admin.layouts.main');
});
Route::get('/contact', function () {
    return view('contact',[
        "title" => "kontak"
    ]);
});

Route::get('/{produk}', [ProdukController::class, 'show'])->name('produkdetail');
Route::get('/register', [UMKMController::class, 'showRegistrationForm']);
Route::POST('/register/input', [UMKMController::class, 'create']);


