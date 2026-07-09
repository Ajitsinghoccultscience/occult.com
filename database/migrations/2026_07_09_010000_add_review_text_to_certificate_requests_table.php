<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('certificate_requests', 'review_text')) {
            return;
        }

        Schema::table('certificate_requests', function (Blueprint $table) {
            $table->text('review_text')->nullable()->after('certificate_type');
        });
    }

    public function down(): void
    {
        if (! Schema::hasColumn('certificate_requests', 'review_text')) {
            return;
        }

        Schema::table('certificate_requests', function (Blueprint $table) {
            $table->dropColumn('review_text');
        });
    }
};
