<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	
	class CreateMatatuOfficialsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('matatu_officials', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('user_id');
				$table->foreign('user_id')->references('id')->on('users');
				$table->unsignedInteger('matatu_id');
				$table->foreign('matatu_id')->references('id')->on('matatus');
				$table->enum('role', ['DRIVER', 'CONDUCTOR']);
				$table->string('driving_licence_number')->nullable();
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
			Schema::dropIfExists('matatu_officials');
		}
	}
