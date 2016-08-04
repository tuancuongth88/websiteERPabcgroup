<?php
class Common {
	public static function getComment($modelName, $modelId)
	{
		$comments = Comment::where('model_id', $modelId)
			->where('model_name', $modelName)
			->orderBy('created_at', 'desc')
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
		// $user = Auth::user()->get();
		// if($user) {
		// 	if ($user->role_id == ROLE_ADMIN) {
		// 		return true;
		// 	}
		// 	$dep = DepRegencyPerFun::where('user_id', $user->id)
		// 			->groupBy('dep_id')
		// 			->lists('dep_id');
		// 	if($dep) {
		// 		$func = DepartmentFunction::whereIn('dep_id', $dep)
		// 					->groupBy('function_id')
		// 					->lists('function_id');
		// 		if(in_array($functionId, $func)) {
		// 			return true;
		// 		}
		// 	}
		// }
		// return false;
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
		$user = Auth::user()->get();
		if($user) {
			if($user->role_id == ROLE_ADMIN) {
				return ASSIGN_STATUS_1;
			}
			$data = $modelName::where($field, $modelId)
				->where('user_id', $user->id)
				->first();
			if($data) {
				return $data->status;
			}
		}
		return NULL;
	}
	public static function checkPermissionUser($funId, $buttonId)
	{
		$userId = CommonUser::getUserId();
		$userRole = CommonUser::getUserRole();
		if ($userRole == ROLE_ADMIN) {
			return true;
		}
		if ($userRole == ROLE_USER) {
			$check = FunButtonUser::where('user_id', $userId)
				->where('button_id', $buttonId)
				->where('fun_id', $funId)
				->first();
			if ($check) {
				return true;
			}
			return false;
		}
	}	
	public static function getListTask($taskId)
	{
		return Task::where('id', '!=', $taskId)->lists('name', 'id');
	}
	public static function getUserIdByUserName($username)
	{
		$user = User::where('username', $username)->first();
		if ($user) {
			return $userId = $user->id;
		}
		return null;
	}
	public static function sendNotification()
	{
		$devices = PushNotification::DeviceCollection(array(
		    PushNotification::Device('token', array('badge' => 5)),
		    PushNotification::Device('token1', array('badge' => 1)),
		    PushNotification::Device('token2')
		));
		$message = PushNotification::Message('Message Text',array(
		    'badge' => 1,
		    'sound' => 'example.aiff',

		    'actionLocKey' => 'Action button title!',
		    'locKey' => 'localized key',
		    'locArgs' => array(
		        'localized args',
		        'localized args',
		    ),
		    'launchImage' => 'image.jpg',

		    'custom' => array('custom data' => array(
		        'we' => 'want', 'send to app'
		    ))
		));

		$collection = PushNotification::app('appNameIOS')
		    ->to($devices)
		    ->send($message);

		// get response for each device push
		foreach ($collection->pushManager as $push) {
		    $response = $push->getAdapter()->getResponse();
		}

		// access to adapter for advanced settings
		$push = PushNotification::app('appNameAndroid');
		$push->adapter->setAdapterParameters(['sslverifypeer' => false]);
		}

		public static function sendMail()
		{
			$data = array('user' => 'tuancuong');
			Mail::send('emails.email', $data, function($message)
			{
			    $message->from('cuongnt@abc-group.vn', 'TuanCuong');

			    $message->to('tuancuongth88@gmail.com');

			});
		}
}