<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admin_users', function (Blueprint $table) {
            if (!Schema::hasColumn('admin_users', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('email');
            }
            if (!Schema::hasColumn('admin_users', 'lp_price')) {
                $table->unsignedInteger('lp_price')->nullable()->after('whatsapp_phone_number_id');
            }
            if (!Schema::hasColumn('admin_users', 'lp_old_price')) {
                $table->unsignedInteger('lp_old_price')->nullable()->after('lp_price');
            }
            if (!Schema::hasColumn('admin_users', 'lp_discount')) {
                $table->string('lp_discount')->nullable()->after('lp_old_price');
            }
            if (!Schema::hasColumn('admin_users', 'lp_timer_minutes')) {
                $table->unsignedInteger('lp_timer_minutes')->nullable()->after('lp_discount');
            }
        });

        // Add 'counsellor' to the role enum (safe to re-run).
        DB::statement("ALTER TABLE admin_users MODIFY COLUMN role ENUM('admin','sender','counsellor') NOT NULL DEFAULT 'sender'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE admin_users MODIFY COLUMN role ENUM('admin','sender') NOT NULL DEFAULT 'sender'");

        Schema::table('admin_users', function (Blueprint $table) {
            $table->dropColumn(['slug', 'lp_price', 'lp_old_price', 'lp_discount', 'lp_timer_minutes']);
        });
    }
};
