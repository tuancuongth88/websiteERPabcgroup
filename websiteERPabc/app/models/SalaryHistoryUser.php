<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class SalaryHistoryUser extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salary_history';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('salary_id', 'user_proposal', 'model_name', 'model_id',
		'status', 'start_date', 'note_user_update', 'salary_old', 'salary_new', 
		'note_reject', 'percent', 'approve_id', 'approve_date', 'type', 'type_salary', 'salary_edit', 'percent_edit', 'type_salary_edit');
    protected $dates = ['deleted_at'];

    public static function getName($history, $field)
    {
        // dd($history->toArray());
    	$modelName = $history->model_name;
    	$modelId = $history->model_id;
		$ob = $modelName::find($modelId);
        if ($ob) {
            return $ob->$field;
        }
		return null; 	
    }
    public static function getSalaryCurrent($history)
    {
    	$salaryId = self::getName($history, 'salary_id');
        if (!$salaryId) {
            return null;
        }
    	return SalaryUser::find($salaryId)->salary;
    }
    public static function getSalaryProposal($value)
    {
    	$salaryId = self::getName($value, 'salary_id');
        if (!$salaryId) {
            return null;
        }
    	$salary = SalaryUser::find($salaryId);
    	$input['type_salary'] = $value->type_salary;
    	$input['percent'] = $value->percent;
    	// dd(getSalaryNew($input, $salary));
    	return getSalaryNew($input, $salary);
    }
   
}
