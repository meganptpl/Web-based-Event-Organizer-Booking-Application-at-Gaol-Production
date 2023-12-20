<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'jenis',
        'harga',
        'gambar',
        'deskripsi'
    ];

    public function pembelianItems()
    {
        return $this->hasMany(PembelianItem::class);
    }
}
