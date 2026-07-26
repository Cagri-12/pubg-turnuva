<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        // Site
        'site_name',
        'logo',
        'footer',

        // İletişim
        'phone',
        'whatsapp',
        'email',

        // Sosyal Medya
        'instagram',
        'discord',
        'youtube',
        'tiktok',

        // Banka
        'bank_name',
        'iban',
        'account_name',

    ];
}