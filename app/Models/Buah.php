<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Buah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'berat',
        'satuan_berat',
        'stok',
        'gambar',
    ];

    public function item(): HasOne
    {
        return $this->hasOne('App\Models\CartItem');
    }

    public function detail(): HasOne
    {
        return $this->hasOne('App\Models\OrderDetail');
    }
}
