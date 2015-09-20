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
            $table->string('images')->nullable();
            $table->string('password', 60);
            $table->time('duration')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('skillID')->unsigned();
            $table->foreign('skillID')->references('skillID')->on('skills');
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
