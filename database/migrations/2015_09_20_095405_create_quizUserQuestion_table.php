<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizUserQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('quizUserQuestion');

        Schema::create('quizUserQuestion', function (Blueprint $table) {
            $table->integer('quizUserID')->unsigned();
            $table->integer('questionID')->unsigned();
            $table->primary(['quizUserID', 'questionID']);
            $table->foreign('quizUserID')->references('quizUserID')->on('quizuser');
            $table->foreign('questionID')->references('questionID')->on('questions');
            $table->text('userAnswer')->nullable();
            $table->integer('mark')->nullable();
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
        Schema::drop('quizUserQuestion');
    }
}
