<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketMusik;
use Illuminate\Http\Request;

class PaketMusikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_musik = PaketMusik::all();
        return view('admin.musik.index', compact('paket_musik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.musik.create');
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
            'deskripsi' => 'required',
        ]);

        // set gambar dan simpan gambar di folder public/images/galeri
        $file = $request->file('gambar');
        $gambar = $file->getClientOriginalName();
        $file->move(public_path('images/musik'), $gambar);

        PaketMusik::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketmusik.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketMusik $paketmusik)
    {
        return view('admin.musik.show', compact('paketmusik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketMusik $paketmusik)
    {
        return view('admin.musik.edit', compact('paketmusik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketMusik $paketmusik)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $gambar = $paketmusik->gambar; // gambar adalah data gambar lama

        if ($request->hasFile('gambar')) { // apakah ada gambar baru yang dimasukkan
            $oldFIle = 'images/musik/' . $paketmusik->gambar; // gambar lama
            if (file_exists($oldFIle)) { // jika gambar lama ada maka hapus file lama
                unlink($oldFIle); // hapus gambar lama
            }
            $file = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $file->move(public_path('images/musik'), $gambar);
        }

        // set parameter baru dan update data galeri
        $paketmusik->update([
            'name' => $request->name,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('admin.paketmusik.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketMusik $paketmusik)
    {
        $oldFIle = 'images/musik/' . $paketmusik->gambar; // gambar
        if (file_exists($oldFIle)) { // jika gambar ada maka hapus gambar
            unlink($oldFIle); // hapus gambar
        }

        $paketmusik->delete();

        return redirect()->route('admin.paketmusik.index')->with('success', 'Data Berhasil Dihapus');
    }
}
