<?php
class CommonSearch{
	public static function searchOffice($input, $model)
	{
		$data = $model::where(function ($query) use ($input)
		{
			if($input['name'] != '') {
				$query = $query->where('name', 'like', '%' .$input['name']. '%');
			}
			if ($input['provider'] != '') {

				$query = $query->where('provider', 'like', '%' .$input['provider']. '%');
			}
			if ($input['status'] != '') {

				$query = $query->where('status', $input['status']);
			}
			if(isset($input['type'] ))
			{
				if ($input['type'] != '') {
					$query = $query->where('type', $input['type']);
				}
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}

}