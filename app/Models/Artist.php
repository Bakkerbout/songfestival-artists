<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'song',
        'final_position',
        'year',
        'country_id',
        'image',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
