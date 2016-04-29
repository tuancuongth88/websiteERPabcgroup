<?php

class DepUserRegencyTableSeeder extends Seeder {

	public function run()
	{
		DepUserRegency::create([
					'dep_id' => '1',
					'regency_id'=>'2',
					'user_id'=>'1',
			]);
		DepUserRegency::create([
					'dep_id' => '1',
					'regency_id'=>'2',
					'user_id'=>'1',
			]);
		DepUserRegency::create([
					'dep_id' => '2',
					'regency_id'=>'1',
					'user_id'=>'1',
			]);
	}

}