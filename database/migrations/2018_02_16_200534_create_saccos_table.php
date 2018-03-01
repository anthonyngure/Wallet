<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaccosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saccos', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('route_id');
	        $table->foreign('route_id')->references('id')->on('routes');
	        $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('postal_address');
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
        Schema::dropIfExists('saccos');
    }
}
