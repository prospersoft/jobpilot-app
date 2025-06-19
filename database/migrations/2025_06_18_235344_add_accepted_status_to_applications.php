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
        DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('applied', 'screening', 'interviewing', 'offer', 'accepted', 'rejected', 'withdrawn', 'wishlist', 'not_accepting') DEFAULT 'applied'");
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn') DEFAULT 'applied'");
    }
};
