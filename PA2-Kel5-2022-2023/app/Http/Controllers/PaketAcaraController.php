<?php

namespace App\Http\Controllers;

use App\Models\PaketDekorasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;

class PaketAcaraController extends Controller
{
    public function index(Request $request)
    {
        $paket_acara = Produk::where('jenis', 'Paket Acara')->paginate(5);
        return view('web.acara', compact('paket_acara'));
    }

    // public function pesan(PaketMakanan $paket_makanan)
    // {
    //     return view('web.pesan', compact('paket_makanan'));
    // }

    // public function check(Product $food){
    //     return view('pages.web.food.check', compact('food'));
    // }
}
