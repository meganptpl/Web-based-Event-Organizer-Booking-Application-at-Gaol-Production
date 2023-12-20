<?php

namespace App\Http\Controllers;

use App\Models\PaketMakanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;

class PaketMakananController extends Controller
{
    public function index(Request $request)
    {
        $paket_makanan = Produk::where('jenis', 'Paket Makanan')->paginate(5);
        return view('web.makanan', compact('paket_makanan'));
    }

    // public function pesan(PaketMakanan $paket_makanan)
    // {
    //     return view('web.pesan', compact('paket_makanan'));
    // }

    // public function check(Product $food){
    //     return view('pages.web.food.check', compact('food'));
    // }
}
