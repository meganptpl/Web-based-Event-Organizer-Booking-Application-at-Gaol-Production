<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembelian;
use App\Models\PembelianItem;
use Illuminate\Support\Facades\Auth;


class PembelianController extends Controller
{

    public function store(Request $request)
    {
        // Memvalidasi input
        $validatedData = $request->validate([
            'username' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_pembelian' => 'required',
            'no_telpon' => 'required|string',
            'bukti_pembayaran' => 'required|file',
        ]);
        $keranjangItems = Pesanan::where('user_id', Auth::user()->id)->get();


        // Menghitung total harga dari produk di keranjang
        $totalHarga = 0;
        foreach ($keranjangItems as $keranjangItem) {
            // Mengambil data produk berdasarkan product_id
            $produk = Produk::find($keranjangItem->product_id);
            if (!$produk) {
                return response()->json(['message' => 'Produk tidak ditemukan'], 400);
            }

            $totalHarga += $produk->harga * $keranjangItem->total;
        }
        $imageName = (time() + rand(1, 100)) . '.' . $request->bukti_pembayaran->extension();
        $request->bukti_pembayaran->move(public_path('images/pembayaran'), $imageName);
        // Membuat objek pembelian baru
        $pembelian = new Pembelian();
        $pembelian->user_id = Auth::user()->id;
        $pembelian->username = $request->username;
        $pembelian->alamat = $request->alamat;
        $pembelian->total_harga = $totalHarga;
        $pembelian->tanggal_pembelian = $request->tanggal_pembelian;
        $pembelian->no_telpon = $request->no_telpon;
        $pembelian->bukti_pembayaran = $imageName;
        $pembelian->status = 'Pending';
        $pembelian->save();

        // Mengambil data keranjang berdasarkan user_id

        // Memasukkan data pembelian item dari keranjang
        foreach ($keranjangItems as $keranjangItem) {
            $pembelianItem = new PembelianItem();
            $pembelianItem->produk_id = $keranjangItem->product_id;
            $pembelianItem->jumlah = $keranjangItem->total;
            $pembelianItem->pembelian_id = $pembelian->id;
            $pembelianItem->save();
        }
        // dd($request->all());
        // Menghapus data keranjang berdasarkan user_id setelah transfer ke pembelian_item
        Pesanan::where('user_id', Auth::user()->id)->delete();

        // Response atau redirect sesuai kebutuhan
        return redirect('/home')->with('success', 'Pemesanan berhasil! Terima kasih!');
    }
}
