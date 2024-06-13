<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_produk',
        'total_harga',
        'metode_bayar',
        'pengiriman',
        'bukti_bayar',
        'status_bayar',
        'status_pengiriman',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function details(): HasMany
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
