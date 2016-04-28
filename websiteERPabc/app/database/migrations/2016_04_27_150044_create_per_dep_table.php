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
		Schema::create('per_dep', function(Blueprint $table){
			$table->increments('id');
			$table->integer('dep_id')->nullable();
			$table->integer('fun_id')->nullable();
			$table->integer('use_id')->nullable();
			$table->integer('pre_id')->nullable();
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
		//
	}

}
