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
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id', 20)->unique();
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->string('surname');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->dateTime('request_date')->useCurrent();
            $table->unsignedBigInteger('room_type_id');
            $table->integer('nr_rooms');
            $table->unsignedBigInteger('person_title_id');
            $table->text('address');
            $table->string('city');
            $table->time('estimated_arrival_time')->nullable();
            $table->longText('special_request')->nullable();
            $table->string('country');
            $table->double('prepayment');
            $table->double('final_rate');
            $table->string('status');
            $table->unsignedBigInteger('payment_details_id')->nullable();
            $table->string('payment_status');
            $table->integer('sent_mail')->nullable()->default(0);
            $table->dateTime('last_sent_email')->nullable();
            $table->timestamps();
        });


        Schema::table('bookings', function (Blueprint $table) {
           $table->foreign('room_type_id')->references('id')->on('room_types');
           $table->foreign('person_title_id')->references('id')->on('person_titles');
            $table->foreign('payment_details_id')->references('id')->on('payment_details');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
