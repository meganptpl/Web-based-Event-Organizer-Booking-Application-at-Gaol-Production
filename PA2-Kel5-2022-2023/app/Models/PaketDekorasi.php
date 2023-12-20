<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketDekorasi extends Model
{
    use HasFactory;
    protected $table = "paket_dekorasi";

    protected $fillable = [
        'name',
        'harga',
        'gambar',
        'jenis',
        'deskripsi'
    ];
}
