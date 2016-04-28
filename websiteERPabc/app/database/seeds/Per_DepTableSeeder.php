<?php

class Per_DepTableSeeder extends Seeder {

	public function run()
	{
		Per_Dep::create([
					'dep_id' => '1',
					'fun_id'=>'2',
					'use_id'=>'1',
					'pre_id'=>'2'
			]);
		Per_Dep::create([
					'dep_id' => '1',
					'fun_id'=>'2',
					'use_id'=>'1',
					'pre_id'=>'2'
			]);
		Per_Dep::create([
					'dep_id' => '2',
					'fun_id'=>'1',
					'use_id'=>'1',
					'pre_id'=>'2'
			]);
	}

}