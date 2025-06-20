<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            // ... other columns ...
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
};
