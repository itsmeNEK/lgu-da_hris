<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkexperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workexperiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('WEidfrom')->nullable();
            $table->string('WEidto')->nullable();
            $table->string('WEpostit')->nullable();
            $table->string('WEdepagen')->nullable();
            $table->string('WEmonthsal')->nullable();
            $table->string('WEsalaryjob')->nullable();
            $table->string('WEstatus')->nullable();
            $table->string('WEgovser')->nullable();
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
        Schema::dropIfExists('workexperiences');
    }
}
