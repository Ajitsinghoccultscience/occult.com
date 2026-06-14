<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('counsellor_links')) {
            return;
        }

        Schema::create('counsellor_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_user_id')->index();
            $table->string('label');                       // friendly name, e.g. "Reena Astrology"
            $table->string('slug')->unique();              // URL slug, e.g. "reena-astrology"
            $table->string('lp_course_name')->nullable();
            $table->string('lp_enrolled')->nullable();
            $table->string('lp_rating')->nullable();
            $table->string('lp_seats')->nullable();
            $table->unsignedInteger('lp_price')->nullable();
            $table->unsignedInteger('lp_old_price')->nullable();
            $table->string('lp_discount')->nullable();
            $table->unsignedInteger('lp_timer_minutes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counsellor_links');
    }
};
