<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return view('index',
    [
        "title" => "beranda"
    ]);
});
Route::get('/login', function () {
    
    return view('login',);
});
Route::get('/register', function () {
    
    return view('register',);
});
Route::get('/produk', function () {
    return view('produk',[
        "title" => "produk"
    ]);
});
Route::get('/kriya', function () {
    return view('produk_kriya',[
        "title" => "kriya"
    ]);
});
Route::get('/kuliner', function () {
    return view('produk_kuliner', [
        "title" => "kuliner"
    ]);
});
Route::get('/mode', function () {
    return view('produk_mode',[
        "title" => "mode"
    ]);
});
Route::get('/detail', function () {
    return view('produk_detail');
});
Route::get('/kontak', function () {
    return view('kontak',[
        "title" => "kontak"
    ]);
});
Route::get('/bantuan', function () {
    return view('bantuan',[
        "title" => "bantuan"
    ]);
});
