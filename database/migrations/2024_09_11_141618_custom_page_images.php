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
        Schema::create('custom_page_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_page_id');
            $table->foreign('custom_page_id')->references('id')->on('custom_pages');
            $table->longText('image_path');
            $table->boolean('is_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_page_images');
    }
};
