<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Modify the status column to accept the new value
            DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn', 'not_accepting')");
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            // Revert the changes if needed
            DB::statement("ALTER TABLE applications MODIFY COLUMN status ENUM('applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn')");
        });
    }
};