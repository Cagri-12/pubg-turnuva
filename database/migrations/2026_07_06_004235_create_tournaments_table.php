<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tournaments', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->string('game');

    $table->date('date');
    $table->time('time');

    $table->decimal('entry_fee', 10, 2)->default(0);
    $table->integer('max_teams');

    $table->decimal('prize_pool', 10, 2)->default(0);

    $table->text('description')->nullable();

    $table->enum('status', [
    'Kayıt Açık',
    'Kayıt Kapandı',
    'Devam Ediyor',
    'Tamamlandı',
    'Arşiv'
])->default('Kayıt Açık');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
