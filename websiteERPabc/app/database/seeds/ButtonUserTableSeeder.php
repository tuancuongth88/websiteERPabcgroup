<?php

class ButtonUserTableSeeder extends Seeder {

	public function run()
	{
		// $button = array('Sửa hợp đồng', 'Sửa bằng cấp',
		//  'Quản lý thể loại nhân viên', 'Quản lý nhân viên',
		//  'Thể loại báo cáo', 'Thể loại thông báo', 'Chức năng phân quyền');
		// foreach ($button as $value) {
		// 	ButtonFunction::create([
		// 		'name'=> $value,
		// 		'function_id'=> 1,
		// 	]);
		// }
		//quan ly nhan vien

		// ButtonFunction::create(['name' => 'Quản lý nhân viên', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Sửa bằng cấp', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Sửa hợp đồng', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Quản lý thể loại nhân viên', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Sửa thông thường', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Sửa nâng cao', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Đổi mật khẩu', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Chức năng phân quyền', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Thêm', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Sửa', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'Xóa', 'function_id' => 1]);
		// ButtonFunction::create(['name' => 'View', 'function_id' => 1]);

		//quan ly bao cao
		// ButtonFunction::create(['name' => 'Thể loại báo cáo', 'function_id' => 2]);
		// ButtonFunction::create(['name' => 'Thêm', 'function_id' => 2]);
		// ButtonFunction::create(['name' => 'Sửa', 'function_id' => 2]);
		// ButtonFunction::create(['name' => 'Xóa', 'function_id' => 2]);
		// ButtonFunction::create(['name' => 'View', 'function_id' => 2]);

		// Quản lý công việc
		// ButtonFunction::create(['name' => 'Thêm', 'function_id' => 3]);
		// ButtonFunction::create(['name' => 'Sửa', 'function_id' => 3]);
		// ButtonFunction::create(['name' => 'Xóa', 'function_id' => 3]);
		// ButtonFunction::create(['name' => 'View', 'function_id' => 3]);

		//Quản lý lương nhân viên
		// ButtonFunction::create(['name' => 'Đề xuất lương', 'function_id' => 4]);
		// ButtonFunction::create(['name' => 'Phê duyệt lương', 'function_id' => 4]);

		//quan ly du an 
		// ButtonFunction::create(['name' => 'Quản lý dự án', 'function_id' => 5]);
		// ButtonFunction::create(['name' => 'Thêm', 'function_id' => 5]);
		// ButtonFunction::create(['name' => 'Sửa', 'function_id' => 5]);
		// ButtonFunction::create(['name' => 'Xóa', 'function_id' => 5]);
		// ButtonFunction::create(['name' => 'View', 'function_id' => 5]);

		//quan ly cong van giay to
		ButtonFunction::create(['name' => 'Quản lý công văn giấy tờ', 'function_id' => 6]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 6]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 6]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 6]);
		ButtonFunction::create(['name' => 'View', 'function_id' => 6]);

		//quan ly hop dong
		ButtonFunction::create(['name' => 'Quản lý hợp đồng', 'function_id' => 7]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 7]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 7]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 7]);
		ButtonFunction::create(['name' => 'View', 'function_id' => 7]);

		//Quản lý đối tác
		ButtonFunction::create(['name' => 'Quản lý đối tác', 'function_id' => 8]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 8]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 8]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 8]);

		//Quản lý Thiết bị
		ButtonFunction::create(['name' => 'Quản lý Thiết bị', 'function_id' => 9]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 9]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 9]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 9]);
		ButtonFunction::create(['name' => 'View', 'function_id' => 9]);

		//Quản lý máy tính
		ButtonFunction::create(['name' => 'Quản lý máy tính', 'function_id' => 10]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 10]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 10]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 10]);
		ButtonFunction::create(['name' => 'View', 'function_id' => 10]);

		//Quản lý tài liệu
		ButtonFunction::create(['name' => 'Quản lý tài liệu', 'function_id' => 11]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 11]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 11]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 11]);
		ButtonFunction::create(['name' => 'View', 'function_id' => 11]);

		//Quản lý Tên miền
		ButtonFunction::create(['name' => 'Quản lý Tên miền', 'function_id' => 12]);
		ButtonFunction::create(['name' => 'Thêm', 'function_id' => 12]);
		ButtonFunction::create(['name' => 'Sửa', 'function_id' => 12]);
		ButtonFunction::create(['name' => 'Xóa', 'function_id' => 12]);
		ButtonFunction::create(['name' => 'View', 'function_id' => 12]);


	}

}
