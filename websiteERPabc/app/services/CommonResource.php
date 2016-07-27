<?php
class CommonResource {

	public static function getTypeResource($id)
	{
		return ResourceDevice::find($id)->name;
	}
	public static function getResourceDevice()
	{
		return ResourceDevice::all()->lists('name', 'id');
	}
	
	public static function search()
	{
		$input = Input::all();
		$data = ResourceDocument::select('resource_documents.*')
			->where(function ($query) use ($input)
		{
			if(!empty($input['name'])) {
				$query = $query->where('resource_documents.name', 'like', '%'.$input['name'].'%');
			}
			if(!empty($input['code'])) {
				$query = $query->where('resource_documents.code', 'like', '%'.$input['code'].'%');
			}
			if(!empty($input['description'])){
				$query = $query->where('resource_documents.description', 'like', '%'.$input['description'].'%');
			}
		})->distinct()->orderBy('resource_documents.name', 'asc')->paginate(PAGINATE);
		return $data;
	}
}