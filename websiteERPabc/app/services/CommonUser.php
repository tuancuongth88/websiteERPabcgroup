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
			foreach ($inputPer[$key] as $k => $v) {
				$inputDepartRegency['dep_id'] = $inputDepartment[$key];
				$inputDepartRegency['regency_id'] = $inputRegency[$key];
				$inputDepartRegency['user_id'] = $id;

				//chưa làm phần phần quyền
				
				// $inputDepartRegency['per_id'] = $v;
				
				DepUserRegency::create($inputDepartRegency);
			}
		}
	}

}