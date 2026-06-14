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
        Schema::table('admin_users', function (Blueprint $table) {
            if (!Schema::hasColumn('admin_users', 'lp_course_name')) {
                $table->string('lp_course_name')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('admin_users', 'lp_enrolled')) {
                $table->string('lp_enrolled')->nullable()->after('lp_course_name');
            }
            if (!Schema::hasColumn('admin_users', 'lp_rating')) {
                $table->string('lp_rating')->nullable()->after('lp_enrolled');
            }
            if (!Schema::hasColumn('admin_users', 'lp_seats')) {
                $table->string('lp_seats')->nullable()->after('lp_rating');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $columns = array_filter([
                Schema::hasColumn('admin_users', 'lp_course_name') ? 'lp_course_name' : null,
                Schema::hasColumn('admin_users', 'lp_enrolled') ? 'lp_enrolled' : null,
                Schema::hasColumn('admin_users', 'lp_rating') ? 'lp_rating' : null,
                Schema::hasColumn('admin_users', 'lp_seats') ? 'lp_seats' : null,
            ]);

            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
