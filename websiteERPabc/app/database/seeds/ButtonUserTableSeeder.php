<?php

class ButtonUserTableSeeder extends Seeder {

	public function run()
	{
		$button = array('Thêm phòng ban','Sửa lương', 'Sưa hợp đồng', 'Sửa bằng cấp');
		foreach ($button as $value) {
				ButtonFunction::create([
					'name'=> $value,
					'function_id'=> 1,
				]);
		}
	
	}

}