<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\User\PesananController;
use App\Http\Controllers\User\PesanController;
use App\Http\Controllers\UserController;
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

Route::post('/do_register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/do_login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/do_logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'do_login'])->name('login')->middleware('guest');
Route::get('/register', function () {
    return view('auth.register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('makanan', function () {
        return view('web.makanan');
    });
    Route::get('musik', function () {
        return view('web.musik');
    });
    Route::get('dekorasi', function () {
        return view('web.dekorasi');
    });
    Route::get('acara', function () {
        return view('web.acara');
    });
    Route::get('galeri', function () {
        return view('web.galeri');
    });
    Route::get('about', function () {
        return view('web.about');
    });
    Route::get('detail', function () {
        return view('web.detail');
    });
    Route::get('testimoni', function () {
        return view('web.testimoni');
    });
    Route::get('bayar', function () {
        return view('web.bayar');
    });
    Route::get('/home-kasir', function () {
        return view('kasir.dashboard.index');
    });
    Route::get('/home-detailpesanan', function () {
        return view('kasir.dashboard.show');
    });
    Route::get('/home-bayar', function () {
        return view('kasir.pembayaran.index');
    });
    Route::resource('admin', AdminController::class);
    Route::resource('user', UserController::class);
    Route::resource('kasir', KasirController::class);

    Route::resource('pesan', PesanController::class);
    Route::get('/home-paketmakanan', function () {
        return view('admin.makanan.index');
    });
    Route::get('/home-tambahpaketmakanan', function () {
        return view('admin.makanan.create');
    });
    Route::get('/home-editpaketmakanan', function () {
        return view('admin.makanan.edit');
    });
    Route::get('/home-paketmusik', function () {
        return view('admin.musik.index');
    });
    Route::get('/home-tambahpaketmusik', function () {
        return view('admin.musik.create');
    });
    Route::get('/home-editpaketmusik', function () {
        return view('admin.musik.edit');
    });
    Route::get('/home-paketacara', function () {
        return view('admin.acara.index');
    });
    Route::get('/home-tambahpaketacara', function () {
        return view('admin.acara.create');
    });
    Route::get('/home-editpaketacara', function () {
        return view('admin.acara.edit');
    });
    Route::get('/home-paketdekorasi', function () {
        return view('admin.dekorasi.index');
    });
    Route::get('/home-tambahpaketdekorasi', function () {
        return view('admin.dekorasi.create');
    });
    Route::get('/home-editpaketdekorasi', function () {
        return view('admin.dekorasi.edit');
    });
    Route::get('/home-pemasukkan', function () {
        return view('admin.pemasukkan.index');
    });
});
// Route::resource('pesan', PesanController::class);

// Route::get('login', function () {
//     return view('web.login');
// });
