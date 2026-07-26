<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'tournament_id',
        'room_id',
        'room_password',
        'map',
        'match_date',
        'start_time',
        'announcement',
        'active',
    ];

    // Oda hangi turnuvaya ait?
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}