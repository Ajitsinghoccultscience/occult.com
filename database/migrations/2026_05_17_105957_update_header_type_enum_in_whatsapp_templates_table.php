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
        $driver = \DB::getDriverName();

        if ($driver === 'mysql') {
            \DB::statement("ALTER TABLE whatsapp_templates MODIFY COLUMN header_type ENUM('none','text','image','document') NOT NULL DEFAULT 'none'");
        } else {
            // SQLite doesn't support MODIFY COLUMN — column already accepts any string, so no change needed
            // The validation in the controller restricts values to none/text/image/document
        }
    }

    public function down(): void
    {
        if (\DB::getDriverName() === 'mysql') {
            \DB::statement("ALTER TABLE whatsapp_templates MODIFY COLUMN header_type ENUM('none','text','image') NOT NULL DEFAULT 'none'");
        }
    }
};
