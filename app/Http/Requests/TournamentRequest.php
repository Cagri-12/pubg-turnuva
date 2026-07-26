<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'title' => 'required|string|max:255',
            'game' => 'required|string|max:255',

            'date' => 'required|date',

            'room_publish_time' => 'required',

            'time' => 'required',

            'entry_fee' => 'required|numeric|min:0',

            'max_teams' => 'required|integer|min:2',

            'prize_pool' => 'required|numeric|min:0',

            // 🥇🥈🥉 Yeni alanlar
            'first_prize' => 'nullable|string|max:255',
            'second_prize' => 'nullable|string|max:255',
            'third_prize' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'status' => 'required|in:Kayıt Açık,Kayıt Kapandı,Devam Ediyor,Tamamlandı,Arşiv',

        ];
    }
}