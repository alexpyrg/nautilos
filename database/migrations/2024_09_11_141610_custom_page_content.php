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
        Schema::create('custom_page_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_page_id');
            $table->foreign('custom_page_id')->references('id')->on('custom_pages');
            $table->longText('content');
            $table->unsignedBigInteger('locale_id');
            $table->foreign('locale_id')->references('id')->on('locales');
            $table->longText('keywords');
            $table->longText('description');
            $table->longText('title');
            $table->longText('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_page_content');
    }
};
