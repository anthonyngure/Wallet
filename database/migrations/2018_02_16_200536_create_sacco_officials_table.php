<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	
	class CreateSaccoOfficialsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('sacco_officials', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('user_id');
				$table->foreign('user_id')->references('id')->on('users');
				$table->unsignedInteger('sacco_id');
				$table->foreign('sacco_id')->references('id')->on('saccos');
				$table->enum('role', ['CHAIRMAN', 'VICE_CHAIRMAN', 'TREASURER', 'ROUTE_INSPECTOR',
					'MEMBER', 'OFFICE_MANAGER', 'MANAGER', 'SECRETARY', 'MECHANIC', 'ACCOUNTS_CLERK']);
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
			Schema::dropIfExists('sacco_officials');
		}
	}
