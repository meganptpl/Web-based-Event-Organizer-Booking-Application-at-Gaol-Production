<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketMakanan extends Model
{
    use HasFactory;
    protected $table = "paket_makanan";

    protected $fillable = [
        'id_paketMakan',
        'name',
        'harga',
        'gambar',
        'deskripsi'
    ];
}
