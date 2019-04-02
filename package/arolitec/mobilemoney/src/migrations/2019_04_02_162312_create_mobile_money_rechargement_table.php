<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileMoneyRechargementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechargement_mobile_money', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('compte');
            $table->float('amount');
            $table->float('phone_number');
            $table->float('mobile_money_type');
            $table->string('reference_id');
            $table->integer('responseCode');
            $table->string('responseMessage');
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
        Schema::dropIfExists('rechargement_mobile_money');
    }
}
