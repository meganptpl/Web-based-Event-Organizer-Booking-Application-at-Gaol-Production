<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketAcaraController;
use App\Http\Controllers\Admin\PaketMusikController;
use App\Http\Controllers\Admin\PaketMakananController;
use App\Http\Controllers\Admin\PaketDekorasiController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('galeri', GaleriController::class);
        Route::resource('paketmakanan', PaketMakananController::class);
        Route::resource('paketdekorasi', PaketDekorasiController::class);
        Route::resource('paketmusik', PaketMusikController::class);
        Route::resource('paketacara', PaketAcaraController::class);
        Route::resource('produk', ProdukController::class);
        Route::get('pemasukkan', [PembelianController::class, 'showPembelian']);
        Route::get('pemasukkan/{id}/show', [PembelianController::class, 'show']);


        // Route::get('pemasukkan', function () {
        //     return view('admin.pemasukkan.index');
        // });
    });
});
