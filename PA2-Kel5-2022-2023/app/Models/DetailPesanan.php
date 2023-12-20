<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;
    protected $table = "detail_pesanan";

    protected $fillable = [
        'id_pesanan',
        'name',
        'noTelp',
        'alamat',
        'tanggal',
        'pesanan',
        'detailPesanan',
        'TotalPesanan',
        'HargaPesanan',
        'JumlahPesanan'
    ];
}
