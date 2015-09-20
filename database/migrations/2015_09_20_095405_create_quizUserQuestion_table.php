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
            $table->integer('quizUserID')->unique();
            $table->integer('questionID')->unique();
            $table->primary(['quizUserID', 'questionID']);
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
