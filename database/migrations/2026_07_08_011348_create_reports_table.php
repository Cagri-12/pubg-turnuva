<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {

            $table->id();

            // Bildirimi yapan kullanıcı
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Hangi turnuva
            $table->foreignId('tournament_id')
                ->constrained()
                ->cascadeOnDelete();

            // Slot numarası
            $table->unsignedTinyInteger('slot');

            // Player numarası
            $table->unsignedTinyInteger('player');

            // Oyuncu nicki
            $table->string('player_name');

            // Açıklama
            $table->text('description')->nullable();

            // Durum
            $table->enum('status', [
                'Bekliyor',
                'İnceleniyor',
                'Çözüldü'
            ])->default('Bekliyor');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};