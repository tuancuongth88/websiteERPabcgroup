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
		$inputPer = $input['per_id'];
		foreach ($inputDepartment as $key => $value) {
			$inputDepartRegency['dep_id'] = $inputDepartment[$key];
			$inputDepartRegency['regency_id'] = $inputRegency[$key];
			$inputDepartRegency['user_id'] = $id;
			$inputDepartRegency['permission_id'] = $inputPer[$key];
			DepRegencyPerUser::create($inputDepartRegency);
		}
	}
	public static function getDepUserRegency($id)
	{
		return DepRegencyPerUser::where('user_id', $id)->get();
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
	public static function getOptionRole(){
		return Role::lists('name', 'id');
		// return array(
		// 	ROLE_ADMIN => 'Quản trị',
		// 	ROLE_USER => 'Nhân viên',
		// );
	}
	public static function getDepartmentUser($id){
		$department = Department::WhereIn('id', DepRegencyPerUser::where('user_id', $id)->lists('dep_id'))->get();
		$nameDepartment = '';
		foreach ($department as $key => $value) {
			$nameDepartment = $nameDepartment.$value->name.'-';
		}
		return  $nameDepartment;
	}
	public static function getInput($input)
	{
		return Input::only('name', 'email', 'username', 'phone','date_of_birth', 'sex', 'ethnic', 'identity_card', 'current_address', 'address', 'degree', 'skyper', 'number_tax', 'number_insure', 'marriage', 'note', 'type_id', 'salary', 'start_time', 'end_time', 'avatar');
		
	}
	public static function getUserId()
	{
		$user = Auth::user()->get();
    	if($user) {
			$userId = $user->id;
		} else {
			$userId = NULL;
		}
		return $userId;
	}
	public static function getUserRole()
	{
		$user = Auth::user()->get();
    	if($user) {
			$userRole = $user->role_id;
		} else {
			$userRole = NULL;
		}
		return $userRole;	
	}

}