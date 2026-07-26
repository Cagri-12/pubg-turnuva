<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'title',
        'game',
        'date',
        'room_publish_time',
        'time',
        'entry_fee',
        'max_teams',
        'prize_pool',

        // 🏆 Yeni ödüller
        'first_prize',
        'second_prize',
        'third_prize',

        'description',
        'status',
    ];

    // Turnuvaya ait takımlar
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    // Turnuvaya ait başvurular
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}