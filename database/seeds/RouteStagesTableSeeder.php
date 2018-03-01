<?php
	
	use Illuminate\Database\Seeder;
	
	class RouteStagesTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//
			$testRoute = \App\Route::firstOrFail();
			
			\App\Stage::all()->each(function (\App\Stage $stage) use ($testRoute) {
				\App\RouteStage::firstOrCreate([
					'route_id' => $testRoute->getKey(),
					'stage_id' => $stage->getKey(),
				]);
			});
		}
	}
