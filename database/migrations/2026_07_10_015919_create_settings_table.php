<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            // Site
            $table->string('site_name')->default('Space Stone Stars');
            $table->string('logo')->nullable();
            $table->text('footer')->nullable();

            // İletişim
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();

            // Sosyal Medya
            $table->string('instagram')->nullable();
            $table->string('discord')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();

            // Banka Bilgileri
            $table->string('bank_name')->nullable();
            $table->string('iban')->nullable();
            $table->string('account_name')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};