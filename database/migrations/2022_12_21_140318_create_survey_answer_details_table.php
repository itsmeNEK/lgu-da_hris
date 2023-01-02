<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('formDetails_id');
            $table->unsignedBigInteger('question_id');
            $table->string('answer');
            $table->string('gap');
            $table->timestamps();

            $table->foreign('answer_id')->references('id')->on('survey_answers')->onDelete('cascade');
            $table->foreign('formDetails_id')->references('id')->on('survey_form_details')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('survey_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_answer_details');
    }
}
