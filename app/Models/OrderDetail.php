<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['kuantitas', 'order_id', 'buah_id'];

    public function order(): BelongsTo
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function buah(): BelongsTo
    {
        return $this->belongsTo('App\Models\Buah');
    }
}
