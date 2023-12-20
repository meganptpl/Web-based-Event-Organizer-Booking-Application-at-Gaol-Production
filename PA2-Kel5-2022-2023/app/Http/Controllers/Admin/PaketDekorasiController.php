<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketDekorasi;
use Illuminate\Http\Request;

class PaketDekorasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_dekorasi = PaketDekorasi::all();
        return view('admin.dekorasi.index', compact('paket_dekorasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dekorasi.create');
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
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        // set gambar dan simpan gambar di folder public/images/galeri
        $file = $request->file('gambar');
        $gambar = $file->getClientOriginalName();
        $file->move(public_path('images/dekorasi'), $gambar);

        PaketDekorasi::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketdekorasi.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketDekorasi $paketdekorasi)
    {
        return view('admin.dekorasi.show', compact('paketdekorasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketDekorasi $paketdekorasi)
    {
        return view('admin.dekorasi.edit', compact('paketdekorasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketDekorasi $paketdekorasi)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        $gambar = $paketdekorasi->gambar; // gambar adalah data gambar lama

        if ($request->hasFile('gambar')) { // apakah ada gambar baru yang dimasukkan
            $oldFIle = 'images/dekorasi/' . $paketdekorasi->gambar; // gambar lama
            if (file_exists($oldFIle)) { // jika gambar lama ada maka hapus file lama
                unlink($oldFIle); // hapus gambar lama
            }
            $file = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images/dekorasi'), $gambar);
        }

        // set parameter baru dan update data galeri
        $paketdekorasi->update([
            'name' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketdekorasi.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketDekorasi $paketdekorasi)
    {
        $oldFIle = 'images/dekorasi/' . $paketdekorasi->gambar; // gambar
        if (file_exists($oldFIle)) { // jika gambar ada maka hapus gambar
            unlink($oldFIle); // hapus gambar
        }

        $paketdekorasi->delete();

        return redirect()->route('admin.paketdekorasi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
