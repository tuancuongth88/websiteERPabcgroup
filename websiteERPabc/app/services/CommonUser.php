<?php
class CommonUser
{
	public static function uploadAction($fileUpload, $pathUpload, $name = null)
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
			return $name;
		}
	//insert phong ban
	public static function insertDepartment($id, $input, $arraystatus = null, $arrayDep = null){
		//cân phải check xem đa validate department chua. cac phòng ban có bị trùng nhau khong đã check quyền chưa
		$inputDepartment = $input['dep_id'];
		$inputRegency = $input['regency_id'];
		$inputPer = $input['user_id'];
		foreach ($inputDepartment as $key => $value) {
			$inputDepartment = $value;
			$inputDepartRegency['dep_id'] = $value;
			$inputDepartRegency['regency_id'] = $inputRegency[$key];
			$inputDepartRegency['user_id'] = $id;
			$inputDepartRegency['parent_user_id'] = $inputPer[$key];
			$inputDepartRegency['status'] = ASSIGN_STATUS_1;
			// if(is_array($arraystatus)){
			// 	if(in_array($inputDepartment, $arrayDep))
			// 		$inputDepartRegency['status'] = $arraystatus[$inputDepartment];
			// 	else 
			// 		$inputDepartRegency['status'] = ASSIGN_STATUS_3;	
			// }else{
			// 	$inputDepartRegency['status'] = ASSIGN_STATUS_3;
			// }
			DepRegencyUserParent::create($inputDepartRegency);
		}
	}
 
	public static function getDepUserRegency($id)
	{
		return DepRegencyUserParent::where('user_id', $id)->get();
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
		if(count($user))
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
		$department = Department::whereIn('id', DepRegencyUserParent::where('user_id', $id)->lists('dep_id'))->get();
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
	public static function getFunUser($id)
	{	
		$listFun = FunButtonUser::where('user_id', $id)->groupBy('fun_id')->lists('fun_id');

		return AdminFunction::whereIn('id', $listFun)->get() ;
	}	
	public static function getButton($id)
	{	
		return ButtonFunction::where('function_id', $id)->lists('name', 'id') ;
	}

	public static function getSelectFunUser($id, $fun_id)
	{	
		$listFun = FunButtonUser::where('user_id', $id)->where('fun_id', $fun_id)->lists('button_id');
		return $listFun ;
	}	
	public static function getDepartmentIdByUser()
	{
		$userId = self::getUserId();
		if ($userId) {
			$departmentId = DepRegencyUserParent::where('user_id', $userId)->lists('dep_id');
			return $departmentId;
		}
		return null;
    }
	public static function checkFuntionUser($model, $modelId, $field)
	{	
		if(!isAdmin()){

		}
		return $listFun ;
	}		
	public static function getFormatReportDepartmentUser()
	{
		if (self::getUserRole() == ROLE_USER) {
			$departmentId = self::getDepartmentIdByUser();
			$listFormat = TypeReport::whereIn('dep_id', $departmentId)->lists('url', 'dep_id');
			return $listFormat;
		}
		if (self::getUserRole() == ROLE_ADMIN) {
			$departmentId = DepRegencyUserParent::lists('dep_id');
			$listFormat = TypeReport::whereIn('dep_id', $departmentId)->lists('url', 'dep_id');
			return $listFormat;
		}
	}

}