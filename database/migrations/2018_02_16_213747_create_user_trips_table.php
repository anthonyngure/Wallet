<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trips', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->unsignedInteger('matatu_trip_id');
	        $table->foreign('matatu_trip_id')->references('id')->on('matatu_trips');
	        $table->string('start_name');
	        $table->double('start_latitude', 8, 5);
	        $table->double('start_longitude', 8, 5);
	        $table->string('end_name');
	        $table->double('end_latitude', 8, 5);
	        $table->double('end_longitude', 8, 5);
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
        Schema::dropIfExists('user_trips');
    }
}
