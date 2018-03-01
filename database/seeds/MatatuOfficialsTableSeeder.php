<?php
	
	use Illuminate\Database\Seeder;
	
	class MatatuOfficialsTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//
			$testMatatu = \App\Matatu::firstOrFail();
			$roles = ['DRIVER', 'CONDUCTOR'];
			$faker = \Faker\Factory::create();
			
			$this->addOfficial($testMatatu, $faker, 'DRIVER');
			$this->addOfficial($testMatatu, $faker, 'CONDUCTOR');
		}
		
		
		private function addOfficial(\App\Matatu $testMatatu, $faker, string $role)
		{
			$user = \App\User::create([
				'name'           => 'Test ' . ucfirst(str_replace('_', '', $role)),
				'email'          => 'test' . strtolower(str_replace('_', '', $role)) . '@wallet.co.ke',
				'email_verified' => 1,
				'phone'          => $faker->unique()->phoneNumber,
				'phone_verified' => 1,
				'password'       => bcrypt('test' . strtolower(str_replace('_', '', $role))),
				'remember_token' => str_random(60),
			]);
			
			$testMatatu->officials()->save(new \App\MatatuOfficial([
				'user_id' => $user->getKey(),
				'role'    => $role,
			]));
		}
	}
