<?php
	
	use App\User;
	use Illuminate\Database\Seeder;
	use TCG\Voyager\Models\Role;
	
	class UsersTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//
			$faker = \Faker\Factory::create();
			$adminRole = Role::where('name', 'admin')->firstOrFail();
			
			//Admin
			User::create([
				'name'           => 'Administrator',
				'email'          => 'admin@wallet.co.ke',
				'email_verified' => 1,
				'phone'          => '254723203475',
				'phone_verified' => 1,
				'password'       => bcrypt('admin'),
				'remember_token' => str_random(60),
				'role_id'        => $adminRole->getKey(),
			]);
			
			//My self as user
			User::create([
				'name'           => 'Test User',
				'email'          => 'testuser@wallet.co.ke',
				'email_verified' => 1,
				'phone'          => '254712345678',
				'phone_verified' => 1,
				'password'       => bcrypt('testuser'),
				'remember_token' => str_random(60),
			]);
		}
	}
