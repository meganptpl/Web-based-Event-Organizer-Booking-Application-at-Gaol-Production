<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $guarded = [''];


    public function pembelianItems()
    {
        return $this->hasMany(PembelianItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
