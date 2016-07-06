<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Resource extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resource_management';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('file_name', 'description', 'link_file', 'user_id', 'typer_id', 'status');
    protected $dates = ['deleted_at'];

   
}
