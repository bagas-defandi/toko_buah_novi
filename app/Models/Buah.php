<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'jumlah_berat',
        'berat',
        'stok',
        'gambar',
    ];

    public function buah_variations(): HasMany
    {
        return $this->hasMany('App\Models\BuahVariation');
    }
}
