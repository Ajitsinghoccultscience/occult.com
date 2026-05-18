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
        \DB::statement("ALTER TABLE whatsapp_templates MODIFY COLUMN header_type ENUM('none','text','image','document') NOT NULL DEFAULT 'none'");
    }

    public function down(): void
    {
        \DB::statement("ALTER TABLE whatsapp_templates MODIFY COLUMN header_type ENUM('none','text','image') NOT NULL DEFAULT 'none'");
    }
};
