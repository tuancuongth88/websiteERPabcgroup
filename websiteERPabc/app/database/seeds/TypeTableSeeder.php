<?php

class TypeTableSeeder extends Seeder {

	public function run()
	{
		TypeUser::create([
					'name'=>'Chính thức',
					'status'=>'1',
			]);
		TypeUser::create([
					'name'=>'Thử Việc',
					'status'=>'1',
			]);
	}

}