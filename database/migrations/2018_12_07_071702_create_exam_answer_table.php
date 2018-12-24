<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->unsignedInteger('exam_question_id');
            $table->foreign('exam_question_id')->references('id')->on('exam_question');
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
        Schema::dropIfExists('exam_answer');
    }
}
