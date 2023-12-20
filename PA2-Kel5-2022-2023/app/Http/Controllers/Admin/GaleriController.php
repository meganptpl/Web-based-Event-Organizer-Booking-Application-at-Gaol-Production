<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required'
        ]);

        // set gambar dan simpan gambar di folder public/images/galeri
        $file = $request->file('gambar');
        $gambar = $file->getClientOriginalName();
        $file->move(public_path('images/galeri'), $gambar);

        Galeri::create([
            'judul' => $request->judul,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        return view('admin.galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required'
        ]);

        $gambar = $galeri->gambar; // gambar adalah data gambar lama

        if ($request->hasFile('gambar')) { // apakah ada gambar baru yang dimasukkan
            $oldFIle = 'images/galeri/' . $galeri->gambar; // gambar lama
            if (file_exists($oldFIle)) { // jika gambar lama ada maka hapus file lama
                unlink($oldFIle); // hapus gambar lama
            }
            $file = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images/galeri'), $gambar);
        }

        // set parameter baru dan update data galeri
        $galeri->update([
            'judul' => $request->judul,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        $oldFIle = 'images/galeri/' . $galeri->gambar; // gambar
        if (file_exists($oldFIle)) { // jika gambar ada maka hapus gambar
            unlink($oldFIle); // hapus gambar
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Data Berhasil Dihapus');
    }
}
