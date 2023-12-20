<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    public function showPembelian()
    {
        $pembelians = Pembelian::with('pembelianItems.produk')->get();

        // foreach ($pembelians as $pembelian) {
        //     // Akses data Pembelian
        //     $pembelianId = $pembelian->id;
        //     $username = $pembelian->username;
        //     $alamat = $pembelian->alamat;
        //     $totalHarga = $pembelian->total_harga;
        //     $tanggalPembelian = $pembelian->tanggal_pembelian;
        //     // ...

        //     // Iterasi melalui PembelianItems
        //     foreach ($pembelian->pembelianItems as $pembelianItem) {
        //         // Akses data PembelianItem
        //         $produkId = $pembelianItem->produk_id;
        //         $jumlah = $pembelianItem->jumlah;
        //         $createdAt = $pembelianItem->created_at;

        //         // Akses data Produk melalui relasi
        //         $produk = $pembelianItem->produk;
        //         if ($produk) {
        //             $namaProduk = $produk->name;
        //             $hargaProduk = $produk->harga;
        //             // ...
        //         }
        //     }
        // }
        return view('admin.pemasukkan.index', compact('pembelians'));
    }

    public function show($id)
    {
        $pembelian = Pembelian::with('pembelianItems.produk')->find($id);

        if ($pembelian) {
            return view('admin.pemasukkan.show', compact('pembelian'));
        }
    }
}
