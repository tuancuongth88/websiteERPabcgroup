<?php

class ButtonUserTableSeeder extends Seeder {

	public function run()
	{
		$button = array('Thêm phòng ban');
		$function = array(5);
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