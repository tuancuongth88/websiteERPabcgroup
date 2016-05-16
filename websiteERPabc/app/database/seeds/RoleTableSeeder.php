<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
		Role::create([
					'name'=>'Giám đốc',
					'status'=>'1',
			]);
		Role::create([
					'name'=>'Nhân viên',
					'status'=>'1',
			]);
	}

}