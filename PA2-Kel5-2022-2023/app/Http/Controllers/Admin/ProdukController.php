<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required|numeric',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        // set gambar dan simpan gambar di folder public/images/galeri
        $file = $request->file('gambar');
        $gambar = $file->getClientOriginalName();
        $file->move(public_path('images/produk'), $gambar);

        Produk::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        $gambar = $produk->gambar; // gambar adalah data gambar lama

        if ($request->hasFile('gambar')) { // apakah ada gambar baru yang dimasukkan
            $oldFIle = 'images/produk/' . $produk->gambar; // gambar lama
            if (file_exists($oldFIle)) { // jika gambar lama ada maka hapus file lama
                unlink($oldFIle); // hapus gambar lama
            }
            $file = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $gambar);
        }

        // set parameter baru dan update data galeri
        $produk->update([
            'name' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $oldFIle = 'images/produk/' . $produk->gambar; // gambar
        if (file_exists($oldFIle)) { // jika gambar ada maka hapus gambar
            unlink($oldFIle); // hapus gambar
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Data Berhasil Dihapus');
    }
}
