<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('location')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('job_link')->nullable();
            $table->text('notes')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'user_id',
                'job_title',
                'company_name',
                'location',
                'salary_range',
                'job_link',
                'notes',
            ]);
        });
    }
};
