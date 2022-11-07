<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('Slname')->nullable();
            $table->string('Sfname')->nullable();
            $table->string('Smnane')->nullable();
            $table->string('Ssuffix')->nullable();
            $table->string('Soccupation')->nullable();
            $table->string('SempBus')->nullable();
            $table->string('SBusAdd')->nullable();
            $table->string('STelNo')->nullable();
            $table->string('Flname')->nullable();
            $table->string('Ffname')->nullable();
            $table->string('Fmname')->nullable();
            $table->string('Fsuffix')->nullable();
            $table->string('Mlname')->nullable();
            $table->string('Mfname')->nullable();
            $table->string('Mmname')->nullable();
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
        Schema::dropIfExists('families');
    }
}
