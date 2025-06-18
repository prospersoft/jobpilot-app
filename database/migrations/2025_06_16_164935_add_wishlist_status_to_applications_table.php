<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // First, convert the column to varchar to avoid data truncation
        DB::statement('ALTER TABLE applications MODIFY status VARCHAR(255)');

        // Update any null values to 'applied' to ensure data consistency
        DB::statement("UPDATE applications SET status = 'applied' WHERE status IS NULL");

        // Now modify it back to ENUM with the new values
        DB::statement("ALTER TABLE applications MODIFY status ENUM('wishlist', 'applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn') NOT NULL DEFAULT 'wishlist'");
    }

    public function down()
    {
        // Convert wishlist entries to 'applied' before removing the option
        DB::statement("UPDATE applications SET status = 'applied' WHERE status = 'wishlist'");
        
        // Remove wishlist from enum
        DB::statement("ALTER TABLE applications MODIFY status ENUM('applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn') NOT NULL DEFAULT 'applied'");
    }
};