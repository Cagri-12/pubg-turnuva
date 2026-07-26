<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
   protected $fillable = [
    'user_id',
    'tournament_id',
    'name',
    'phone',
    'team_name',
    'sender_name',
    'receipt',
    'status',
    'slot',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}