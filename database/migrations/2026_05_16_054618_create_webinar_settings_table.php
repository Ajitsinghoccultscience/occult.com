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
        Schema::create('webinar_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();          // astrology | graphology
            $table->string('webinar_name');
            $table->string('event_date');             // Sat, 16th May 2026
            $table->string('event_date_short');       // May 16th
            $table->string('attend_date');            // May 16th
            $table->string('event_time');             // 2:00 PM – 4:00 PM IST
            $table->string('whatsapp_url');
            $table->string('price')->default('99');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinar_settings');
    }
};
