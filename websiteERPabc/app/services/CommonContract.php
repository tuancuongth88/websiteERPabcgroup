<?php
class CommonContract {

	public static function getNamePartner(){
		return Partner::all()->lists('name', 'id');
	}
	
	public static function search()
	{
		$input = Input::all();
		$data = Contract::select('contracts.*')
			->where(function ($query) use ($input)
		{
			if(!empty($input['name'])) {
				$query = $query->where('contracts.name', 'like', '%'.$input['name'].'%');
			}
			if(!empty($input['code'])) {
				$query = $query->where('contracts.code', 'like', '%'.$input['code'].'%');
			}
			if(!empty($input['date_active'])){
				$query = $query->where('contracts.date_active', 'like', '%'.$input['date_active'].'%');
			}
			if(!empty($input['type'])){
				$query = $query->where('contracts.type', 'like', '%'.$input['type'].'%');
			}
			if(!empty($input['status'])){
				$query = $query->where('contracts.status', 'like', '%'.$input['status'].'%');
			}
		})->distinct()->orderBy('contracts.name', 'asc')->paginate(PAGINATE);
		return $data;
	}
}
