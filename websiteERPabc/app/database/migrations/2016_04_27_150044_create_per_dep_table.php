<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerDepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dep_functions', function(Blueprint $table){
			$table->increments('id');
			$table->integer('dep_id')->nullable();
			$table->integer('fun_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('per_id')->nullable();
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
		Schema::drop('dep_functions');
	}

}
