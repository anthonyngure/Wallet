<?php
	
	use Illuminate\Database\Seeder;
	
	class MatatusTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//
			$testSacco = \App\Sacco::firstOrFail();
			$testSacco->matatus()->save(new \App\Matatu([
				'name' => 'Test Matatu',
				'licence_plate' => 'KCY 2017Z',
				'seats_capacity' => 33,
			]));
		}
	}
