<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kasir\PesananController;
use App\Http\Controllers\Kasir\PembayaranController;

Route::prefix('kasir')->name('kasir.')->group(function () {
    Route::middleware(['auth', 'verified', 'role:kasir'])->group(function () {
        Route::get('/dashboard', [PesananController::class, 'showPembelian'])->name('pesanan.index');
        Route::get('pesanan/{id}/show', [PesananController::class, 'show'])->name('pesanan.show');
        Route::get('request_download_pdf/{id}', [PesananController::class, 'pdfDownload'])->name('request_download_pdf');
        Route::get('/bayar', [PembayaranController::class, 'showPembayaran']);

        Route::post('pembayaran/{id}/Diproses', [PembayaranController::class, 'Diproses'])->name('Diproses');
        Route::post('pembayaran/{id}/Selesai', [PembayaranController::class, 'Selesai'])->name('Selesai');
        Route::get('/download/{id}/pembelian',  [PembayaranController::class, 'downloadGambar'])->name('download.gambar');
    });
});
