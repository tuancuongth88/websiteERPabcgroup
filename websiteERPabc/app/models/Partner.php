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
	protected $fillable = array('name', 'fullname', 'email', 'address', 'phone', 'comment', 'status');
    protected $dates = ['deleted_at'];

   
}
