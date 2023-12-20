<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use PDF;

class PesananController extends Controller
{
    public function showPembelian()
    {
        $pembelians = Pembelian::with('pembelianItems.produk')->get();
        return view('kasir.dashboard.index', compact('pembelians'));
    }

    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id)->load('pembelianItems.produk');
        return view('kasir.dashboard.show', compact('pembelian'));
    }

    public static function pdfDownload($id)
    {
        $pembelian = Pembelian::findOrFail($id)->load('pembelianItems.produk', 'user');
        $pdf = PDF::loadView('kasir.dashboard.pdf', compact('pembelian'));
        return $pdf->download('Data Pesanan.pdf');
    }
}
