<?php

class DepFunctionTableSeeder extends Seeder {

	public function run()
	{
		DepFunction::create([
					'dep_id' => '1',
					'fun_id'=>'2',
					'user_id'=>'1',
					'per_id'=>'2'
			]);
		DepFunction::create([
					'dep_id' => '1',
					'fun_id'=>'2',
					'user_id'=>'1',
					'per_id'=>'2'
			]);
		DepFunction::create([
					'dep_id' => '2',
					'fun_id'=>'1',
					'user_id'=>'1',
					'per_id'=>'2'
			]);
	}

}