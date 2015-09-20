<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('quizUser');

        Schema::create('quizUser', function (Blueprint $table) {
            $table->increments('quizUserID');
            $table->integer('mark')->nullable();
            $table->boolean('finish')->default(0);
            $table->integer('quizID')->unsigned();
            $table->foreign('quizID')->references('quizID')->on('quizs');
            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('userID')->on('users');
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
        Schema::drop('quizUser');
    }
}
