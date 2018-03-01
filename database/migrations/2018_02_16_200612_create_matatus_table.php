<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	
	class CreateMatatusTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('matatus', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('sacco_id');
				$table->foreign('sacco_id')->references('id')->on('saccos');
				$table->string('licence_plate');
				$table->unsignedSmallInteger('seats_capacity');
				$table->string('name')->nullable();
				$table->string('image')->default('matatus/default.png');
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
			Schema::dropIfExists('matatus');
		}
	}
