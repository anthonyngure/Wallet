<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	
	class CreateRouteStagesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('route_stages', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('route_id');
				$table->foreign('route_id')->references('id')->on('routes');
				$table->unsignedInteger('stage_id');
				$table->foreign('stage_id')->references('id')->on('stages');
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
			Schema::dropIfExists('route_stages');
		}
	}
