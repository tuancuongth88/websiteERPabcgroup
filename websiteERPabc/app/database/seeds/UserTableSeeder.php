<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
					'email'=>'tuancuong@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'trantung',
					'phone' => '123456789',
					'avatar' => 'a1.jpg',
					'status'=>'1',
					'dep_id'=>'1',
					'regency_id'=>'1',
			]);
		User::create([
					'email'=>'si@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'si',
					'phone' => '123456789',
					'avatar' => 'a2.jpg',
					'status'=>'1',
					'dep_id'=>'1',
					'regency_id'=>'2',
					]);
		User::create([
					'email'=>'dung@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'dung',
					'phone' => '123456',
					'avatar' => 'a3.jpg',
					'status'=>'1',
					'dep_id'=>'1',
					'regency_id'=>'3',
			]);
	}

}