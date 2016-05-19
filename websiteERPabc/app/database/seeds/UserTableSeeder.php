<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
					'email'=>'lmhung@abc-group.vn',
					'password'=>Hash::make('123456'),
					'username' => 'lmhung',
					'phone' => '123456789',
					'avatar' => 'a1.jpg',
					'status'=>'1',
					'role_id'=>'1',
			]);
		User::create([
					'email'=>'trantunghn196@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'trantung',
					'phone' => '123456789',
					'avatar' => 'a1.jpg',
					'status'=>'1',
					'role_id'=>'2',
					'salary_id'=>'1',
			]);
		User::create([
					'email'=>'si@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'si',
					'phone' => '123456789',
					'avatar' => 'a2.jpg',
					'status'=>'1',
					'role_id'=>'2',
					'salary_id'=>'2',
					]);
		User::create([
					'email'=>'dung@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'dung',
					'phone' => '123456',
					'avatar' => 'a3.jpg',
					'status'=>'1',
					'role_id'=>'2',
					'salary_id'=>'3',
			]);
	}
}
