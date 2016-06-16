<?php

class ButtonUserTableSeeder extends Seeder {

	public function run()
	{
		$button = array('Sửa hợp đồng', 'Sửa bằng cấp',
		 'Quản lý thể loại nhân viên', 'Quản lý nhân viên',
		 'Thể loại báo cáo', 'Thể loại thông báo', 'Chức năng phân quyền');
		foreach ($button as $value) {
			ButtonFunction::create([
				'name'=> $value,
				'function_id'=> 1,
			]);
		}
		ButtonFunction::create(['name' => 'Quản lý dự án', 'function_id' => 1]);
		ButtonFunction::create(['name' => 'Đổi mật khẩu', 'function_id' => 1]);
		ButtonFunction::create(['name' => 'Sửa thông thường', 'function_id' => 1]);
		ButtonFunction::create(['name' => 'Sửa nâng cao', 'function_id' => 1]);
	}

}