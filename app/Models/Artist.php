<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artist extends Model
{
    /**
     * @var int|mixed|string|null
     */
//    public mixed $user_id;
    protected $table = 'artists'; // Voeg dit toe

    protected $fillable = [
        'name',
        'song',
        'final_position',
        'year',
        'country_id',
        'image',
        'user_id',
        'status',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
