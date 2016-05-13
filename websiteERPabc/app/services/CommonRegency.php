<?php
class CommonRegency
{
	public static function checkOptionCheckboxRegency($modelName, $id1, $id2,$id3, $field1, $field2, $field3)
	{
		$check = $modelName::where($field1, $id1)->where($field2, $id2)->where($field3, $id3)->first();
		if ($check) {
			return true;
		}
		return false;
	}
}