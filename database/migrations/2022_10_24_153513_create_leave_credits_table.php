<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('elc_period_from')->nullable();
            $table->string('elc_period_to')->nullable();
            $table->string('elc_particular')->nullable();
            $table->float('elc_vl_earned',50,3)->nullable();
            $table->float('elc_vl_auw_p',50,3)->nullable();
            $table->float('elc_vl_balance',50,3)->nullable();
            $table->float('elc_vl_auwo_p',50,3)->nullable();
            $table->float('elc_sl_earned',50,3)->nullable();
            $table->float('elc_sl_auw_p',50,3)->nullable();
            $table->float('elc_sl_balance',50,3)->nullable();
            $table->float('elc_sl_auwo_p',50,3)->nullable();
            $table->string('elc_cdo')->nullable();
            $table->string('elc_remarks')->nullable();
            $table->string('elc_privilage')->nullable();
            $table->string('elc_force_leave')->nullable();
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
        Schema::dropIfExists('leave_credits');
    }
}
