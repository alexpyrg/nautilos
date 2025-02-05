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
        Schema::create('trip_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('locale_id')->constrained()->cascadeOnDelete(); // References your locales table
            $table->string('name'); // Translated name of the trip type
            $table->text('description')->nullable(); // Optional: Translated description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_type_translations');
    }
};
