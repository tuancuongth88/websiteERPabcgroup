<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('functions', function(Blueprint $table){
			$table->increments('id');
			$table->string('name',256)->nullable();
			$table->string('description', 500)->nullable();
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
		Schema::drop('functions');
	}

}
