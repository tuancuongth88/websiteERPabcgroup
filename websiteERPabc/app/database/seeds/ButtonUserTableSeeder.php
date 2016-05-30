<?php

class ButtonUserTableSeeder extends Seeder {

	public function run()
	{
		$button = array('Thêm phòng ban','Sửa lương', 'Sưa hợp đồng', 'Sửa bằng cấp','Quản lý lương', 'Quản lý dự án', 'Quản lý phòng ban', 'Quản lý chức vụ', 'Quản lý thể loại nhân viên', 'Quản lý nhân viên', 'Thể loại báo cáo', 'Thể lọa thông báo');
		foreach ($button as $value) {
				ButtonFunction::create([
					'name'=> $value,
					'function_id'=> 1,
				]);
		}
	
	}

}