<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketMusik extends Model
{
    use HasFactory;
    protected $table = "paket_musik";

    protected $fillable = [
        'id_paketMusik',
        'name',
        'harga',
        'gambar',
        'deskripsi'
    ];
}
