<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ArchiveUser extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'archive_users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('user_receive', 'user_send', 'archive_id', 'comment', 'status');
    protected $dates = ['deleted_at'];

   
}
