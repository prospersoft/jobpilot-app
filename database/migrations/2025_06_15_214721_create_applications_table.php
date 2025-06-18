<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('job_title');
            $table->enum('status', ['wishlist', 'applied', 'screening', 'interviewing', 'offer', 'rejected', 'withdrawn']);
            $table->datetime('applied_date')->nullable(); // Make it nullable here
            $table->text('job_description')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('location')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};