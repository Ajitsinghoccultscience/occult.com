<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('whatsapp_templates', function (Blueprint $table) {
            $table->string('category', 50)->default('MARKETING')->after('language');
            $table->json('example_values')->nullable()->after('variables');
            $table->string('meta_status', 30)->nullable()->after('status'); // PENDING, APPROVED, REJECTED from Meta
            $table->text('rejection_reason')->nullable()->after('meta_status');
        });
    }

    public function down(): void
    {
        Schema::table('whatsapp_templates', function (Blueprint $table) {
            $table->dropColumn(['category', 'example_values', 'meta_status', 'rejection_reason']);
        });
    }
};
