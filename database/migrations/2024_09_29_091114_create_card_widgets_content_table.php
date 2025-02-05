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
        Schema::create('card_widgets_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('locale_id');
            $table->foreign('locale_id')->references('id')->on('locales');
            $table->unsignedBigInteger('card_widget_id');
            $table->foreign('card_widget_id')->references('id')->on('card_widgets');
            $table->string('title');
            $table->longText('description');
            $table->string('feature_1');
            $table->string('feature_2');
            $table->string('feature_3');
            $table->string('book_now');
            $table->string('view_more');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_widgets_content');
    }
};
