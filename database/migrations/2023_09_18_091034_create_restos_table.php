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
        Schema::create('restos', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->string("menu");
            $table->string("address");
            $table->string("ratings");
            $table->bigInteger("price");
            $table->string("photo_1");
            $table->string("photo_2");
            $table->string("photo_3");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restos');
    }
};
