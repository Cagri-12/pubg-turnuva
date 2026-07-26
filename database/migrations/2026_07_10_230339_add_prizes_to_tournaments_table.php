<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {

            $table->string('first_prize')->nullable();
            $table->string('second_prize')->nullable();
            $table->string('third_prize')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {

            $table->dropColumn([
                'first_prize',
                'second_prize',
                'third_prize'
            ]);

        });
    }
};