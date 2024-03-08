<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukKulinerController;
use App\Http\Controllers\ProdukModeController;
use App\Http\Controllers\ProdukKriyaController;
use App\Http\Controllers\BantuanController;

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

// Route::get('/detail/{id}', [ProdukController::class, 'show'])->name('produk_detail');
Route::get('/detail', function(){
    return view('produk_detail',['title' => 'detail']);
});
Route::get('/kontak', function () {
    return view('kontak',[
        "title" => "kontak"
    ]);
});

