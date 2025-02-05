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
        Schema::create('booking_payment_links', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id', 255);
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->string('token', 20)->unique();
            $table->dateTime('expires_on');
            $table->boolean('expired')->default(false);
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_payment_links');
    }
};
