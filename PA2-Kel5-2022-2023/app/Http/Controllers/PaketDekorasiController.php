<?php

namespace App\Http\Controllers;

use App\Models\PaketDekorasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;

class PaketDekorasiController extends Controller
{
    public function index(Request $request)
    {
        $paket_dekorasi = Produk::where('jenis', 'Paket Dekorasi')->paginate(5);
        return view('web.dekorasi', compact('paket_dekorasi'));
    }

    // public function pesan(PaketMakanan $paket_makanan)
    // {
    //     return view('web.pesan', compact('paket_makanan'));
    // }

    // public function check(Product $food){
    //     return view('pages.web.food.check', compact('food'));
    // }
}
