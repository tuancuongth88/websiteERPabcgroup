<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepUserRegencyTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dep_user_regencies', function(Blueprint $table){
			$table->increments('id');
			$table->integer('dep_id')->nullable();
			$table->integer('regency_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->softDeletes();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dep_user_regencies');
	}

}
