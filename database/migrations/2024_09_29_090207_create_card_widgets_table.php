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
        Schema::create('card_widgets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('order');
            $table->unsignedBigInteger('roomType_id');
            $table->foreign('roomType_id')->references('id')->on('room_types');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_widgets');
    }
};
