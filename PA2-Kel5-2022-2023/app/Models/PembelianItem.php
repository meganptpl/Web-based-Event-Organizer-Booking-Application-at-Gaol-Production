<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianItem extends Model
{
    use HasFactory;
    protected $table = 'pembelian_item';
    protected $guarded = [''];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
