<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('itemno');
            $table->string('salarygrade');
            $table->string('monthly');
            $table->string('education');
            $table->string('trainig');
            $table->string('experience');
            $table->string('eligibility');
            $table->string('competency')->default('N/A');
            $table->string('assignment');
            $table->string('status')->default(1)->comment('1:active 0:inactive');
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
        Schema::dropIfExists('publications');
    }
}
