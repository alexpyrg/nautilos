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
//        Schema::table('bookings', function (Blueprint $table) {
//            $table->unsignedBigInteger('locale_id')->nullable();
//            $table->foreign('locale_id')->references('id')->on('locales');
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('bookings', function (Blueprint $table) {
//            $table->dropForeign('bookings_locale_id_foreign');
//            $table->dropColumn('locale_id');
//        });
    }
};
