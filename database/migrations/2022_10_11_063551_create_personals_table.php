<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('ext_name')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_service')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('gsis_id')->nullable();
            $table->string('pag_ibig_id')->nullable();
            $table->string('ph_id')->nullable();
            $table->string('sss_id')->nullable();
            $table->string('tin_id')->nullable();
            $table->string('a_e_n')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('country')->nullable();
            $table->string('h_b_l_no')->nullable();
            $table->string('street')->nullable();
            $table->string('village')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('h_b_l_no_2')->nullable();
            $table->string('street_2')->nullable();
            $table->string('village_2')->nullable();
            $table->string('barangay_2')->nullable();
            $table->string('city_2')->nullable();
            $table->string('province_2')->nullable();
            $table->string('zipcode_2')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('personals');
    }
}
