<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaketMusik;
use App\Models\Produk;

class PaketMusikController extends Controller
{
    public function index(Request $request)
    {
        $paket_musik = Produk::where('jenis', 'Paket Musik')->paginate(5);
        return view('web.musik', compact('paket_musik'));
    }

    // public function pesan(PaketMusik $paket_musik)
    // {
    //     return view('web.pesan', compact('paket_musik'));
    // }

    // public function check(Product $food){
    //     return view('pages.web.food.check', compact('food'));
    // }
}
