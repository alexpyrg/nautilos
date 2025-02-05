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
        Schema::create('page_image_alt', function (Blueprint $table) {
            $table->id();
            $table->text('alt');
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('page_images');
            $table->unsignedBigInteger('locale_id');
            $table->foreign('locale_id')->references('id')->on('locales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_image_alt');
    }
};
