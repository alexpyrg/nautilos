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
        Schema::create('page_content', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('url')->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
            $table->longText('custom_head_content')->nullable();
            $table->integer('page_layout_type');
            $table->string('display_name')->nullable();
            $table->longText('content')->nullable();
            $table->bigInteger('locale_id')->unsigned();
            $table->bigInteger('page_id')->unsigned();
            $table->foreign('locale_id')->references('id')->on('locales');
            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_content');
    }
};
