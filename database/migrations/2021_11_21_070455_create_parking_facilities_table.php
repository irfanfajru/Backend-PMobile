<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_facilities', function (Blueprint $table) {
            $table->id('fac_id');
            $table->unsignedBigInteger('park_id');
            $table->string('fac_name');
            $table->string('desc');
            $table->timestamps();
            $table->foreign('park_id')->references('park_id')->on('parking_lot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_facilities');
    }
}
