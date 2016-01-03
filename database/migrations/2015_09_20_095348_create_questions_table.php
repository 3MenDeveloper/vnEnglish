<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('questions');

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('questionID');
            $table->text('ask');
            $table->text('option')->nullable();
            $table->text('rightAnswer');
            $table->text('rightAnswerNote')->nullable();
            $table->integer('type')->default(1);
            $table->boolean('active')->default(1);
            $table->integer('categoryID')->unsigned();
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade') ;
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
        Schema::drop('questions');
    }
}
