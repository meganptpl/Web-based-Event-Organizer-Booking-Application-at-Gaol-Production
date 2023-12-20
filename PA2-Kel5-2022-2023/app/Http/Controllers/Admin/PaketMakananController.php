<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketMakanan;
use Illuminate\Http\Request;

class PaketMakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_makanan = PaketMakanan::all();
        return view('admin.makanan.index', compact('paket_makanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.makanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        // set gambar dan simpan gambar di folder public/images/galeri
        $file = $request->file('gambar');
        $gambar = $file->getClientOriginalName();
        $file->move(public_path('images/makanan'), $gambar);

        PaketMakanan::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketmakanan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketMakanan $paketmakanan)
    {
        return view('admin.makanan.show', compact('paketmakanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketMakanan $paketmakanan)
    {
        return view('admin.makanan.edit', compact('paketmakanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketMakanan $paketmakanan)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $gambar = $paketmakanan->gambar; // gambar adalah data gambar lama

        if ($request->hasFile('gambar')) { // apakah ada gambar baru yang dimasukkan
            $oldFIle = 'images/makanan/' . $paketmakanan->gambar; // gambar lama
            if (file_exists($oldFIle)) { // jika gambar lama ada maka hapus file lama
                unlink($oldFIle); // hapus gambar lama
            }
            $file = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images/makanan'), $gambar);
        }

        // set parameter baru dan update data galeri
        $paketmakanan->update([
            'name' => $request->name,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketmakanan.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketMakanan $paketmakanan)
    {
        $oldFIle = 'images/makanan/' . $paketmakanan->gambar; // gambar
        if (file_exists($oldFIle)) { // jika gambar ada maka hapus gambar
            unlink($oldFIle); // hapus gambar
        }

        $paketmakanan->delete();

        return redirect()->route('admin.paketmakanan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
