<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembayaranController extends Controller
{
    public function showPembayaran()
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
        return view('kasir.pembayaran.index', compact('pembelians'));
    }

    public function show($id)
    {
        $pembelian = Pembelian::with('pembelianItems.produk')->find($id);

        if ($pembelian) {
            return view('kasir.pembayaran.index', compact('pembelian'));
        }
    }

    public function downloadGambar($id)
    {
        $pembelian = Pembelian::find($id);
        // Path gambar yang akan didownload
        if (!$pembelian) {
            abort(404);
        }
        $gambarPath = public_path('images/pembayaran/' . $pembelian->bukti_pembayaran);

        // Mengambil nama file dari path
        $namaFile = basename($gambarPath);

        // Mengecek apakah file gambar ada
        // if (!Storage::exists($gambarPath)) {
        //     abort(404);
        // }

        // Memberikan respons file gambar kepada pengguna
        return response()->download($gambarPath, $namaFile);
    }

    public function Diproses($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->status = 'Diproses';
        $pembelian->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengkonfirmasi pesanan',
        ]);
    }

    public function Selesai($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->status = 'Selesai';
        $pembelian->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menyelesaikan pesanan',
        ]);
    }
}
