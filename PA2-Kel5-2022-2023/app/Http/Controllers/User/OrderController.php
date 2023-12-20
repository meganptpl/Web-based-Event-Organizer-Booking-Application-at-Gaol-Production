<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'total' => 'required',
        ]);
        $previousUrl = url()->previous();
        $id_trim = Str::of($previousUrl)->afterLast('/')->__toString();
        $cek = Pesanan::where('user_id', auth()->user()->id)->where('product_id', $id_trim)->first();
        if ($cek) {
            $pesan = Pesanan::where('user_id', auth()->user()->id)->where('product_id', $id_trim)->first();
            $pesan->total = $pesan->total + $request->total;
            $pesan->save();
        } else {
            $pesan = Pesanan::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id_trim,
                'total' => $request->total,
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Pesanan Berhasil Ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        //
    }
}
