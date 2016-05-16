<?php
class CommonUser
{
	public static function uploadAction($fileUpload, $pathUpload)
		{
			if(Input::hasFile($fileUpload)){
				$file = Input::file($fileUpload);
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				if(isset($isUnique)) {
					$filename = getFilename($filename);
				}
				$pathUpload = public_path().$pathUpload;
				$uploadSuccess = $file->move($pathUpload, $filename);
				return $filename;
			}
		}
	//update phong ban
	public static function insertDepartment($id, $input){
		//cân phải check xem đa validate department chua. cac phòng ban có bị trùng nhau khong đã check quyền chưa
		$inputDepartment = $input['dep_id'];
		$inputRegency = $input['regency_id'];
		// $inputPer = $input['per_id'];
		foreach ($inputDepartment as $key => $value) {
			$inputDepartRegency['dep_id'] = $inputDepartment[$key];
			$inputDepartRegency['regency_id'] = $inputRegency[$key];
			$inputDepartRegency['user_id'] = $id;
			DepUserRegency::create($inputDepartRegency);
			
			// foreach ($inputPer[$key] as $k => $v) {
				

			// 	//chưa làm phần phần quyền
				
			// 	// $inputDepartRegency['per_id'] = $v;
				
			// }
		}
	}
	public static function getDepUserRegency($id)
	{
		return DepUserRegency::where('user_id', $id)->get();
	}

	public static function getObjectFromAuth()
    {
    	if($admin = Auth::admin()->get())
			return $admin;
		if ($user = Auth::user()->get()) 
			return $user;
    }
	public static function getUsernameById($userId = null)
	{
		if($userId == null) {
			return 'Admin';
		} else {
			$username = CommonOption::getFieldTextByModel('User', $userId, 'username');
			return $username;
		}
	}
	public static function checkUserIsExit($username)
	{
		$user = User::where('username', $username)->get();
		if(is_array($user))
			return true;
		return false;
	}

}