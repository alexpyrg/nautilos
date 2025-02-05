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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('name');
            $table->string('file_name');
            $table->boolean('is_published')->default(false);
            $table->boolean('is_home')->default(false);
//            $table->boolean('has_subpages')->default(false)->nullable();
            $table->boolean('is_subpage')->default(false);
            $table->bigInteger('parent_page')->nullable();
            $table->timestamps();
            $table->boolean('is_hardCoded')->default(false);
            // what i do here is create a page with id and name.
            // when the user creates a page it will automatically be added to the db
            // also some json files will be created in /json/{locale}/{page_name}.json ??? NOT A GOOD IDEA FOR MULTIPLE SITES WITH A SINGLE DB
            // json files are good for single sites.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
