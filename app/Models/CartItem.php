<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'kuantitas',
        'cart_id',
        'buah_id',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function buah(): BelongsTo
    {
        return $this->belongsTo('App\Models\Buah');
    }
}
