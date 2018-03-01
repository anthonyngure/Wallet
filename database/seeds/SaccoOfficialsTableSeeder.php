<?php
	
	use Illuminate\Database\Seeder;
	
	class SaccoOfficialsTableSeeder extends Seeder
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
			$faker = \Faker\Factory::create();
			$roles = ['CHAIRMAN', 'VICE_CHAIRMAN', 'TREASURER', 'ROUTE_INSPECTOR', 'MEMBER', 'OFFICE_MANAGER',
				'MANAGER', 'SECRETARY', 'MECHANIC', 'ACCOUNTS_CLERK'];
			
			$this->addOfficial($testSacco, $faker, 'CHAIRMAN');
			$this->addOfficial($testSacco, $faker, 'VICE_CHAIRMAN');
			$this->addOfficial($testSacco, $faker, 'TREASURER');
			$this->addOfficial($testSacco, $faker, 'ROUTE_INSPECTOR');
			$this->addOfficial($testSacco, $faker, 'OFFICE_MANAGER');
			$this->addOfficial($testSacco, $faker, 'MANAGER');
			$this->addOfficial($testSacco, $faker, 'SECRETARY');
			$this->addOfficial($testSacco, $faker, 'MECHANIC');
			$this->addOfficial($testSacco, $faker, 'ACCOUNTS_CLERK');
			
		}
		
		private function addOfficial(\App\Sacco $testSacco, $faker, string $role)
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
			
			$testSacco->officials()->save(new \App\SaccoOfficial([
				'user_id' => $user->getKey(),
				'role'    => $role,
			]));
		}
	}
