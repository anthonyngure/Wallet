<?php
	
	use Illuminate\Database\Seeder;
	
	class SaccosTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			$testRoute = \App\Route::firstOrFail();
			//
			\App\Sacco::create([
				'route_id'       => $testRoute->getKey(),
				'name'           => 'Test Sacco',
				'postal_address' => '9216, 00200-NAIROBI',
				'email'          => 'testsacco@wallet.co.ke',
				'phone'          => '254712345678',
			]);
			
		}
	}
