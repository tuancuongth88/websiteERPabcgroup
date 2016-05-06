<?php
class CommonOption {

	public static function getOption($model)
	{
		$array = array(
			null => 'Parent',
		);
		return $array + self::childOption($model);
	}
	public static function parentOption($model)
	{
		return $model::whereNull('parent_id')->lists('name', 'id');
	}
	public static function childOption($model)
	{
		$parents = self::parentOption($model);
		$child = $model::whereNotNull('parent_id')->lists('name', 'id');
		foreach ($child as $key => $value) {
			$parentId = $model::find($key)->parent_id;
			if($parentId) {
				$child[$key] = $model::find($parentId)->name . '-' . $value;
			}
			else {
				dd('sai');
			}
		}
		return $parents + $child;
	}
	public static function getNameOption($model, $value)
	{
		$parent_id = $model::find($value->id)->parent_id;
		if ($parent_id) {
			return $model::find($parent_id)->name;
		}
		return null;
	}
	public static function deleteParent($modelName, $id)
	{
		$parentId = $modelName::find($id)->parent_id;
		if ($parentId) {
			$list = $modelName::where('parent_id', $id)->update(['parent_id' => $parentId]);
		}
		else {
			$modelName::where('parent_id', $id)->update(['parent_id' => null]);
		}
	}
	public static function checkOptionCheckbox($modelName, $id1, $id2, $field1, $field2)
	{
		$check = $modelName::where($field1, $id1)->where($field2, $id2)->first();
		if ($check) {
			return true;
		}
		return false;
	}

	public static function checkValueCheckbox($modelName, $id1, $id2, $field1, $field2)
	{
		$check = $modelName::where($field1, $id1)->where($field2, $id2)->first();
		if ($check) {
			return CHECKED;
		}
		return NOT_CHECKED;
	}

	public static function getKeyFromArray($input)
	{
		$array = [];
		foreach ($input as $key => $value) {
			$array[] = $key;
		}
		return $array;
	}
	public static function getOptionAllModel($model)
	{
		return $model::where('status', '=', 1)->lists('name', 'id');
	}

}