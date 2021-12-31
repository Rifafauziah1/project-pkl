<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, //menghilangkan ftur regis
    'reset' => false, //menghilangkan ftur forgot

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['prefix' => 'admin', 'middleware' => [
//  'auth',
//'role:admin',
//]], function () {
//  Route::get('/', function () {
//    return 'halaman admin';
//});

//Route::get('profile', function () {
//  return 'halaman profile admin';
//});

//});

//Route::group(['prefix' => 'pengguna', 'middleware' => [
//   'auth',
//    'role:pengguna',
//]], function () {
//    Route::get('/', function () {
//        return 'halaman pengguna';
//    });

//    Route::get('profile', function () {
//        return 'halaman profile pengguna';
//    });

//});

//Route::group(['prefix' => 'pembelian', 'middleware' => [
//    'auth',
//    'role:admin|kasir',
//]], function () {
//    Route::get('/', function () {
//        return 'halaman pembelian';
//    });

//    Route::get('laporan', function () {
//        return 'halaman laporan pembelian';
//    });

//});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::get('buku', function () {
    //     return view('buku.index');
    // })->middleware(['role:admin|pengguna']);

    // Route::get('pengarang', function () {
    //     return view('pengarang.index');
    // })->middleware(['role:admin']);;

    Route::resource('kategori', KategoriController::class)->middleware(['role:admin']);
    Route::resource('pengarang', PengarangController::class)->middleware(['role:admin']);
    Route::resource('penerbit', PenerbitController::class)->middleware(['role:admin']);
    Route::resource('buku', BukuController::class)->middleware(['role:admin']);
    Route::resource('pembeli', PembeliController::class)->middleware(['role:admin']);
    Route::resource('transaksi', TransaksiController::class)->middleware(['role:admin']);

});
