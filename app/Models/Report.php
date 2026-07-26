<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'tournament_id',
        'slot',
        'player',
        'player_name',
        'description',
        'status',
    ];

    // Bildirimi yapan kullanıcı
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Bildirimin ait olduğu turnuva
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}