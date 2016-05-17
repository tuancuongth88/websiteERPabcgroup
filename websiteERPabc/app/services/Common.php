<?php
class Common {
	public static function getComment($modelName, $modelId)
	{
		$comments = Comment::where('model_id', $modelId)
			->where('model_name', $modelName)
			->get();
		return $comments;
	}
	public static function insertComment($modelName, $modelId, $input)
	{
		$comment['model_name'] = $modelName;
		$comment['model_id'] = $modelId;
		$comment['description'] = $input['description'];
		$comment['user_id'] = Auth::user()->get()->id;
		$comment['status'] = $input['status'];
		return Comment::create($comment)->id;
	}
	public static function getDateTimeString($datetime, $option = null)
	{
		if(!empty($datetime)) {
			if($option) {
				$date = date('d-m-Y H:i:s', strtotime($datetime));	
			} else {
				$date = date('d-m-Y', strtotime($datetime));
			}
			return $date;	
		}
		return '';
	}
	public static function checkUserFunction($functionId)
	{
		$user = Auth::user()->get();
		if($user) {
			if ($user->role_id == ROLE_ADMIN) {
				return true;
			}
			$dep = DepRegencyPerFun::where('user_id', $user->id)
					->groupBy('dep_id')
					->lists('dep_id');
			if($dep) {
				$func = DepartmentFunction::whereIn('dep_id', $dep)
							->groupBy('function_id')
							->lists('function_id');
				if(in_array($functionId, $func)) {
					return true;
				}
			}
		}
		return false;
	}
	public static function getModelUserStatus($model1, $model2, $relateField, $userId, $status)
	{
		$data = DB::table($model1)->join($model2, $model2.'.'.$relateField, '=', $model1.'.id')
			->select($model1.'.*')
			->where($model2.'.user_id', $userId)
			->where($model2.'.status', $status)
			->get();
		if($data) {
			return $data;
		}
		return null;
	}
	public static function checkModelUserFunction($modelName, $modelId, $field)
	{
		$user = Auth::user()->get();
		if($user) {
			if($user->role_id == ROLE_ADMIN) {
				return true;
			}
			$data = $modelName::where($field, $modelId)
				->where('user_id', $user->id)
				->where('status', ASSIGN_STATUS_1)
				->first();
			if($data) {
				$perId = $data->per_id;
				if($perId == PERMISSION_1) {
					return true;
				} else {
					return false;
				}
			}
		}
		return false;
	}
	public static function checkModelUserStatus($modelName, $modelId, $field)
	{
		//
	}

}