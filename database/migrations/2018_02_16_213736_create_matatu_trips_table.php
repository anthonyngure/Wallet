<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	
	class CreateMatatuTripsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('matatu_trips', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('matatu_id');
				$table->foreign('matatu_id')->references('id')->on('matatus');
				$table->unsignedInteger('matatu_official_id');
				$table->foreign('matatu_official_id')->references('id')->on('matatu_officials');
				
				$table->double('fare', 6, 2);
				
				$table->timestamp('start_time');
				$table->string('start_remarks')->nullable();
				$table->unsignedInteger('start_stage_id');
				$table->foreign('start_stage_id')->references('id')->on('stages');
				
				$table->unsignedInteger('destination_stage_id');
				$table->foreign('destination_stage_id')->references('id')->on('stages');
				
				$table->timestamp('end_time')->nullable();
				$table->string('end_remarks')->nullable();
				$table->unsignedInteger('end_stage_id')->nullable();
				$table->foreign('end_stage_id')->references('id')->on('stages');
				
				$table->timestamps();
				
				$table->string('delete_remarks')->nullable();
				$table->unsignedInteger('delete_stage_id')->nullable();
				$table->foreign('delete_stage_id')->references('id')->on('stages');
				$table->softDeletes();
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('matatu_trips');
		}
	}
