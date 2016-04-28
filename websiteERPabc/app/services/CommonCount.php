<?php
class CommonCount {

	public static function count($model, $modelId, $field)
	{
		$ob = $model::where($field, $modelId)->get();
		return count($ob);
	}
}