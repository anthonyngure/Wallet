<?php
	
	use Illuminate\Database\Seeder;
	
	class RoutesTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//
			
			\App\Route::create([
				'name'                 => 'Embakasi route, through joggo road, donholm, City Stadium, Pipeline, Tumaini Estate and Fedha Estate, Avenue Estate',
				'number'               => '33',
				'pick_up_instructions' => 'Board the matatu at Muthurwa market or along tom mboya street opp National Archives',
			]);
		}
	}
