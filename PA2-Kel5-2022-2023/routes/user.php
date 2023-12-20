<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketMusikController;
use App\Http\Controllers\PaketMakananController;
use App\Http\Controllers\PaketDekorasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaketAcaraController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PembayaranController;
use App\Http\Controllers\User\PembelianController;
use App\Http\Controllers\User\PesanController;
use App\Http\Controllers\User\TestimoniController;
use App\Models\Pembelian;

Route::post('/do_register', [AuthController::class, 'do_register'])->middleware('guest');
Route::post('/do_login', [AuthController::class, 'do_login'])->middleware('guest');
Route::get('/do_logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', [IndexController::class, 'index'])->name('home')->middleware('auth');


Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/paketmakanan', [PaketMakananController::class, 'index'])->name('paketmakanan');
Route::get('/paketmusik', [PaketMusikController::class, 'index'])->name('paketmusik');
Route::get('/paketdekorasi', [PaketDekorasiController::class, 'index'])->name('paketdekorasi');
Route::get('/paketacara', [PaketAcaraController::class, 'index'])->name('paketacara');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('pembelian', [PembelianController::class, 'store'])->name('pembelian.store');

Route::get('acara', function () {
    return view('web.acara');
});
// Route::get('galeri', function () {
//     return view('web.galeri');
// });

Route::get('about', function () {
    return view('web.about');
});
Route::get('detail', function () {
    return view('web.detail');
});
Route::get('bayar', function () {
    return view('web.bayar');
});

Route::prefix('user')->group(function () {
    Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
        Route::resource('pesan', PesanController::class);
        Route::resource('order', OrderController::class);
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('review', TestimoniController::class);
        Route::get('testimoni', function () {
            return view('web.testimoni');
        });
    });
});
