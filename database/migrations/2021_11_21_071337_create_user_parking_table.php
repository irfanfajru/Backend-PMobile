<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_parking', function (Blueprint $table) {
            $table->id('userpark_id');
            $table->unsignedBigInteger('park_id');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->datetime('order_time');
            $table->datetime('checkin_time');
            $table->datetime('checkout_time');
            $table->bigInteger('cost');
            $table->string('status');
            $table->timestamps();
            $table->foreign('park_id')->references('park_id')->on('parking_lot');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_parking');
    }
}
