<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuahVariation extends Model
{
    use HasFactory;

    public function buah(): BelongsTo
    {
        return $this->belongsTo('App\Models\Buah');
    }
}