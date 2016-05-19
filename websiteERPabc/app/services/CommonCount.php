<?php
class CommonCount {

	public static function count($model, $modelId, $field)
	{
		$ob = $model::where($field, $modelId)->get();
		return count($ob);
	}
	public static function countUserOnDep($model, $modelId, $field, $modelStatus, $fieldStatus)
	{
		$ob = $model::where($field, $modelId)->where($fieldStatus, $modelStatus)->get();
		return count($ob);
	}
}