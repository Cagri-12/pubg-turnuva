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
        Schema::create('registrations', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->string('phone');
    $table->string('team_name');
    $table->string('sender_name');
    $table->string('receipt');

    $table->enum('status', [
        'Bekliyor',
        'Onaylandı',
        'Reddedildi'
    ])->default('Bekliyor');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
