<?php

class CommentController extends AdminController {

	public function comment($modelId)
	{
		dd(1);
		$input = Input::except('_token');
		dd($input);
	}
	// public function comment($modelId)
	// {
	// 	$input = Input::except('_token');
	// 	dd($input);
	// }

}
