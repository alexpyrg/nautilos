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
        Schema::create('carousel_images_captions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carousel_image_id');
            $table->foreign('carousel_image_id')->references('id')->on('carousel_images');
            $table->boolean('is_enabled')->default(false);
            $table->text('caption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousel_images_captions');
    }
};
