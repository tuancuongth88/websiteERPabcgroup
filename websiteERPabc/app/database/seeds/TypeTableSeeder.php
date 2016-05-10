<?php

class TypeTableSeeder extends Seeder {

	public function run()
	{
		Type::create([
					'name'=>'Chính thức',
					'status'=>'1',
			]);
		Type::create([
					'name'=>'Thử Việc',
					'status'=>'1',
			]);
	}

}