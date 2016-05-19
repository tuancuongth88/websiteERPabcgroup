<?php

class ButtonTableSeeder extends Seeder {

	public function run()
	{
		$button = array('Thêm mới', 'Sửa', 'Xoá', 'View');
		$function = array(1,2,3,4);
		foreach ($button as $value) {
			foreach ($function as $v) {
				ButtonFunction::create([
					'name'=> $value,
					'function_id'=> $v,
				]);
			}
			
		}
	
	}

}