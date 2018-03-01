<?php
	
	use Illuminate\Database\Seeder;
	
	class StagesTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//
			
			\App\Stage::create([
				'address'   => 'Taj Shopping Mall, Embakasi, Outer Ring Road, Nairobi',
				'latitude'  => -1.323010,
				'longitude' => 36.898983,
			]);
			
			\App\Stage::create([
				'address'   => 'Pipeline Stage, Nairobi',
				'latitude'  => -1.317401,
				'longitude' => 36.895888,
			]);
			
			\App\Stage::create([
				'address'   => 'Stage Mpya, Nairobi',
				'latitude'  => -1.313185,
				'longitude' => 36.891810,
			]);
			
			\App\Stage::create([
				'address'   => 'Donholm Stage, Nairobi',
				'latitude'  => -1.296973,
				'longitude' => 36.886886,
			]);
			
			\App\Stage::create([
				'address'   => 'Hamza Stage, Jogoo Road, Nairobi',
				'latitude'  => -1.296939,
				'longitude' => 36.875576,
			]);
			
			\App\Stage::create([
				'address'   => 'Makadara Stage, Jogoo Road, Nairobi',
				'latitude'  => -1.296373,
				'longitude' => 36.862411,
			]);
			
			\App\Stage::create([
				'address'   => 'Uchumi Stage, Jogoo Road, Nairobi',
				'latitude'  => -1.296009,
				'longitude' => 36.860493,
			]);
			
			\App\Stage::create([
				'address'   => 'City Stadium Stage, Nairobi',
				'latitude'  => -1.292390,
				'longitude' => 36.842680,
			]);
			
			\App\Stage::create([
				'address'   => 'Muthurwa Market, Nairobi City',
				'latitude'  => -1.286499,
				'longitude' => 36.832778,
			]);
			
			\App\Stage::create([
				'address'   => 'Machakos Bus Stage, Pumwani Road, Nairobi',
				'latitude'  => -1.285853,
				'longitude' => 36.834952,
			]);
			
			\App\Stage::create([
				'address'   => 'O.T.C, Landhies Road, Nairobi',
				'latitude'  => -1.284896,
				'longitude' => 36.831178,
			]);
			
			\App\Stage::create([
				'address'   => 'Accra Road, Nairobi',
				'latitude'  => -1.282987,
				'longitude' => 36.826917,
			]);
			
			
			
		}
	}
