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
        Schema::create('monthly_rates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('month_name')->nullable(); //name is the FIRST 3 letters of a month! JAN for january MAY for may and DEC for december!
            $table->integer('number'); //number is the number of the selected month. 1 = january 12 = december..
            $table->double('rate'); //rate is the price in euros per month!
            $table->unsignedBigInteger('room_type_id');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_rates');
    }
};
