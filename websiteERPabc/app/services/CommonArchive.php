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
			
		})->distinct()->orderBy('archives.name', 'asc')->paginate(PAGINATE);
		return $data;
	}
}