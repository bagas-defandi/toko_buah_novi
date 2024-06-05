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
        'berat',
        'satuan_berat',
        'stok',
        'gambar',
    ];
}
