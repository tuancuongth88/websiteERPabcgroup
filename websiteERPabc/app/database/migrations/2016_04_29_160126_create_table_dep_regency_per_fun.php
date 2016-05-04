<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepRegencyPerFun extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dep_regency_per_funs', function(Blueprint $table){
			$table->increments('id');
			$table->integer('dep_id')->nullable();
			$table->integer('regency_id')->nullable();
			$table->integer('permission_id')->nullable();
			$table->integer('function_id')->nullable();
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
		Schema::drop('dep_regency_per_funs');
	}

}
