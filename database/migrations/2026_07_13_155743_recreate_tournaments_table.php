<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {

            $table->dropColumn('status');

        });

        Schema::table('tournaments', function (Blueprint $table) {

            $table->enum('status', [
                'Kayıt Açık',
                'Kayıt Kapandı',
                'Devam Ediyor',
                'Tamamlandı',
                'Arşiv',
            ])->default('Kayıt Açık');

        });
    }

    public function down(): void
    {
        Schema::table('tournaments', function (Blueprint $table) {

            $table->dropColumn('status');

        });

        Schema::table('tournaments', function (Blueprint $table) {

            $table->enum('status', [
                'Yakında',
                'Aktif',
                'Kayıt Kapandı',
                'Tamamlandı',
            ])->default('Yakında');

        });
    }
};