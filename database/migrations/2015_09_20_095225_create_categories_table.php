<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Drop table if exists
         */
        Schema::dropIfExists('categories');

        /**
         * Create tables
         */
        
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('categoryID');
            $table->string('title');
            $table->integer('exp');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
