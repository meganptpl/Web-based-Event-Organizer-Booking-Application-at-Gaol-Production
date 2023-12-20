<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketAcara;
use Illuminate\Http\Request;

class PaketAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_acara = PaketAcara::all();
        return view('admin.acara.index', compact('paket_acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.acara.create');
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
        $file->move(public_path('images/acara'), $gambar);

        PaketAcara::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketacara.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketAcara $paketacara)
    {
        return view('admin.acara.show', compact('paketacara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketAcara $paketacara)
    {
        return view('admin.acara.edit', compact('paketacara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketAcara $paketacara)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        $gambar = $paketacara->gambar; // gambar adalah data gambar lama

        if ($request->hasFile('gambar')) { // apakah ada gambar baru yang dimasukkan
            $oldFIle = 'images/acara/' . $paketacara->gambar; // gambar lama
            if (file_exists($oldFIle)) { // jika gambar lama ada maka hapus file lama
                unlink($oldFIle); // hapus gambar lama
            }
            $file = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images/acara'), $gambar);
        }

        // set parameter baru dan update data galeri
        $paketacara->update([
            'name' => $request->name,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketacara.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketAcara $paketacara)
    {
        $oldFIle = 'images/acara/' . $paketacara->gambar; // gambar
        if (file_exists($oldFIle)) { // jika gambar ada maka hapus gambar
            unlink($oldFIle); // hapus gambar
        }

        $paketacara->delete();

        return redirect()->route('admin.paketacara.index')->with('success', 'Data Berhasil Dihapus');
    }
}
