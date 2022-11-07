<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educationals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('EDlevel')->nullable();
            $table->string('EDNameSchool')->nullable();
            $table->string('EDBEDC')->nullable();
            $table->string('EDpoaFROM')->nullable();
            $table->string('EDpoaTO')->nullable();
            $table->string('EDHLUE')->nullable();
            $table->string('EDyeargrad')->nullable();
            $table->string('EDsahr')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educationals');
    }
}
