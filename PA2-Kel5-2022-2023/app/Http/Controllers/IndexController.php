<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\PaketMakanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $paket_makanan = Produk::where('jenis', 'Paket Makanan')->paginate(5);
        return view('web.index', compact('paket_makanan'));
    }
}
