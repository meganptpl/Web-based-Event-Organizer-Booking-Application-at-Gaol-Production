<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $galeri = Galeri::paginate(5);
        return view('web.galeri', compact('galeri'));
    }

    // public function pesan(PaketMakanan $paket_makanan)
    // {
    //     return view('web.pesan', compact('paket_makanan'));
    // }

    // public function check(Product $food){
    //     return view('pages.web.food.check', compact('food'));
    // }
}
