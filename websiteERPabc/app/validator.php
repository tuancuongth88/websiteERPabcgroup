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

