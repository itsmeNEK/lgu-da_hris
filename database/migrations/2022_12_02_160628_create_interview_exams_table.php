<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('app_id');
            $table->unsignedBigInteger('pub_id');
            $table->string('written_exam_date')->nullable();
            $table->string('written_exam')->nullable();
            $table->string('oral_exam_date')->nullable();
            $table->string('oral_exam')->nullable();
            $table->string('background')->nullable();
            $table->string('performance')->nullable();
            $table->string('pspt')->nullable();
            $table->string('potential')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('pub_id')->references('id')->on('publications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_exams');
    }
}
