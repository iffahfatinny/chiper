<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;
class Chirp extends Model
{
    protected $fillable = [
        'message',
    ];

    //define relationship between users and chirps
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
