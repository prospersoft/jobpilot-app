<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // First, convert to VARCHAR to avoid data loss
        DB::statement('ALTER TABLE applications MODIFY status VARCHAR(255)');

        // Then update to new ENUM with all possible values
        DB::statement("ALTER TABLE applications MODIFY status ENUM(
            'wishlist',
            'applied',
            'screening',
            'interviewing',
            'offer',
            'rejected',
            'withdrawn',
            'not_accepting'
        ) NOT NULL DEFAULT 'applied'");
    }

    public function down()
    {
        // Convert any 'not_accepting' to 'withdrawn' before removing the option
        DB::statement("UPDATE applications SET status = 'withdrawn' WHERE status = 'not_accepting'");
        
        // Revert to original ENUM
        DB::statement("ALTER TABLE applications MODIFY status ENUM(
            'wishlist',
            'applied',
            'screening',
            'interviewing',
            'offer',
            'rejected',
            'withdrawn'
        ) NOT NULL DEFAULT 'applied'");
    }
};