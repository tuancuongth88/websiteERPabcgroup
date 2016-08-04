<?php
class CommonPartner {
	public static function getNameParent($id){
		$data = Partner::find($id)->name;
		return $data;
	}
	public static function getSearch(){
		$input = Input::all();
		$data = Partner::select('partners.*')
			->where(function ($query) use ($input)
		{
			if(!empty($input['name'])) {
				$query = $query->where('partners.name', 'like', '%'.$input['name'].'%');
			}
			if(!empty($input['email'])) {
				$query = $query->where('partners.email', 'like', '%'.$input['email'].'%');
			}
			if(!empty($input['address'])) {
				$query = $query->where('partners.address', $input['address']);
			}
		})->distinct()->orderBy('partners.name', 'asc')->where('type', TYPE_PARTNER_1)->where('parent_id', null)->paginate(PAGINATE);
		return $data;
	}
	public static function getSearchService(){
		$input = Input::all();
		$data = Partner::select('partners.*')
			->where(function ($query) use ($input)
		{
			if(!empty($input['fullname'])) {
				$query = $query->where('partners.fullname', 'like', '%'.$input['fullname'].'%');
			}
		})->distinct()->orderBy('partners.fullname', 'asc')->where('type', TYPE_PARTNER_2)->where('parent_id', null)->paginate(PAGINATE);
		return $data;
	}

	public static function getSearchClue(){
		$input = Input::all();
		$data = Partner::select('partners.*')
			->where(function ($query) use ($input)
		{
			$query = $query->where('parent_id', $input['id']);
			if($input['name'] != '') {
				$query = $query->where('fullname', 'like', '%'.$input['name'].'%');
			}
			if($input['department']!= '') {
				$query = $query->where('department', 'like', '%'.$input['department'].'%');
			}
			if($input['regency']!= '') {
				$query = $query->where('regency', $input['regency']);
			}
		})->where('type', TYPE_PARTNER_1)->orderBy('fullname', 'DECS')->paginate(PAGINATE);
		return $data;
	}
}
