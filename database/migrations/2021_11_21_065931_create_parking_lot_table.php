<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_lot', function (Blueprint $table) {
            $table->id('park_id');
            $table->string('name');
            $table->text('location');
            $table->float('latitude');
            $table->float('longitude');
            $table->bigInteger('car_price');
            $table->bigInteger('bike_price');
            $table->integer('car_slot');
            $table->integer('bike_slot');
            $table->text('operational');
            $table->integer('status');
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
        Schema::dropIfExists('parking_log');
    }
}
