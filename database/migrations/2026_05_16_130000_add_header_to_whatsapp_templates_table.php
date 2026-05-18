<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('whatsapp_templates', function (Blueprint $table) {
            $table->enum('header_type', ['none', 'text', 'image'])->default('none')->after('category');
            $table->string('header_text')->nullable()->after('header_type');
            $table->string('header_image')->nullable()->after('header_text'); // stored file path
        });
    }

    public function down(): void
    {
        Schema::table('whatsapp_templates', function (Blueprint $table) {
            $table->dropColumn(['header_type', 'header_text', 'header_image']);
        });
    }
};
