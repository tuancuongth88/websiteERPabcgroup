<?php

class DepFunctionTableSeeder extends Seeder {

	public function run()
	{
		DepFunction::create([
					'dep_id' => '1',
					'fun_id'=>'2',
					'use_id'=>'1',
					'pre_id'=>'2'
			]);
		DepFunction::create([
					'dep_id' => '1',
					'fun_id'=>'2',
					'use_id'=>'1',
					'pre_id'=>'2'
			]);
		DepFunction::create([
					'dep_id' => '2',
					'fun_id'=>'1',
					'use_id'=>'1',
					'pre_id'=>'2'
			]);
	}

}