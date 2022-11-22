<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('Q34a')->nullable();
            $table->string('Q34b')->nullable();
            $table->string('Q34b1')->nullable();
            $table->string('Q35a')->nullable();
            $table->string('Q35a1')->nullable();
            $table->string('Q35b')->nullable();
            $table->string('Q35b1')->nullable();
            $table->string('Q35b2')->nullable();
            $table->string('Q36a')->nullable();
            $table->string('Q36a1')->nullable();
            $table->string('Q37a')->nullable();
            $table->string('Q37a1')->nullable();
            $table->string('Q38a')->nullable();
            $table->string('Q38a1')->nullable();
            $table->string('Q38b')->nullable();
            $table->string('Q38b1')->nullable();
            $table->string('Q39a')->nullable();
            $table->string('Q39a1')->nullable();
            $table->string('Q40a')->nullable();
            $table->string('Q40a1')->nullable();
            $table->string('Q40b')->nullable();
            $table->string('Q40b1')->nullable();
            $table->string('Q40c')->nullable();
            $table->string('Q40c1')->nullable();
            $table->string('Rname1')->nullable();
            $table->string('Rname2')->nullable();
            $table->string('Rname3')->nullable();
            $table->string('Radd1')->nullable();
            $table->string('Radd2')->nullable();
            $table->string('Radd3')->nullable();
            $table->string('Rtel1')->nullable();
            $table->string('Rtel2')->nullable();
            $table->string('Rtel3')->nullable();
            $table->string('IDa1')->nullable();
            $table->string('IDa2')->nullable();
            $table->string('IDb1')->nullable();
            $table->string('IDb2')->nullable();
            $table->string('IDc1')->nullable();
            $table->string('IDc2')->nullable();
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
        Schema::dropIfExists('others');
    }
}
