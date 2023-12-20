<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketAcara extends Model
{
    use HasFactory;
    protected $table = "paket_acara";

    protected $fillable = [
        'id_paketAcara',
        'name',
        'jenis',
        'harga',
        'gambar',
        'deskripsi'
    ];
}
