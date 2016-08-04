<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Partner extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'partners';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'fullname', 'email', 'address', 'phone', 'type', 'department', 'regency', 'parent_id');
    protected $dates = ['deleted_at'];

   
}
