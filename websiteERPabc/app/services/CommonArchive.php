<?php
class CommonArchive {
	public static function search()
	{
		$input = Input::all();
		$data = Archive::select('archives.*')
			->where(function ($query) use ($input)
		{
			if(!empty($input['name'])) {
				$query = $query->where('archives.name', 'like', '%'.$input['name'].'%');
			}
			if(!empty($input['code'])) {
				$query = $query->where('archives.code', 'like', '%'.$input['code'].'%');
			}
			if(!empty($input['status'])) {
				$query = $query->where('archives.status', $input['status']);
			}
			if(!empty($input['type'])) {
				$query = $query->where('archives.type', $input['type']);
			}
			if(!empty($input['partner_id'])) {
				$query = $query->where('archives.partner_id', $input['partner_id']);
			}
			if(!empty($input['date_active'])) {
				$query = $query->where('archives.date_active', $input['date_active']);
			}
			
			
		})->distinct()->orderBy('archives.name', 'asc')->paginate(PAGINATE);
		return $data;
	}
}