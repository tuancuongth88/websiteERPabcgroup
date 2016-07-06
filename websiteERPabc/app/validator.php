<?php
Validator::extend('checkbox', function($attribute, $value, $parameters)
{
	dd($value);
});
Validator::extend('salary', function($attribute, $value, $parameters)
{
	$user = User::find($value);
	if ($user->salary_id) {
		return false;
	}
	return true;
});
Validator::extend('addFuntion', function($attribute, $value, $parameters)
{
	$buttonFuntion = ButtonFunction::find($value);
	if ($buttonFuntion->name) {
		return false;
	}
	return true;
});
Validator::extend('checkTime', function($attribute, $value, $parameters)
{
	if(strtotime($input['start']) < strtotime($input['end'])){
		return false;
	}
	return true;
});