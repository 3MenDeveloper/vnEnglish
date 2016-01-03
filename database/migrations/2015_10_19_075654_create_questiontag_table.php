<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestiontagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questiontag', function (Blueprint $table) {
            $table->integer('questionID')->unsigned();
            $table->integer('tagID')->unsigned();
            $table->primary(['questionID', 'tagID']);
            $table->foreign('questionID')->references('questionID')->on('questions')->onDelete('cascade');
            $table->foreign('tagID')->references('tagID')->on('tags')->onDelete('cascade');
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
        Schema::drop('questiontag');
    }
}
