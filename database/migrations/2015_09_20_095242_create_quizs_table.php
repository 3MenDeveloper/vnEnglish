<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('quizs');

        Schema::create('quizs', function (Blueprint $table) {
            $table->increments('quizID');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('password', 60);
            $table->integer('duration')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('categoryID')->unsigned();
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade');
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
        Schema::drop('quizs');
    }
}
