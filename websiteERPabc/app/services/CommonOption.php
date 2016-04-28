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
}