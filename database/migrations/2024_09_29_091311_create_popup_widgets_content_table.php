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
        Schema::create('popup_widgets_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('locale_id');
            $table->foreign('locale_id')->references('id')->on('locales');
            $table->unsignedBigInteger('popup_widget_id');
            $table->foreign('popup_widget_id')->references('id')->on('popup_widgets');
            $table->string('title');
            $table->longText('content');
            $table->string('bottom_line');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popup_widgets_content');
    }
};
