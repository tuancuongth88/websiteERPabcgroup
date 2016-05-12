<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table){
			$table->increments('id');
            $table->string('name', 256)->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('start', 256)->nullable();
            $table->string('end', 256)->nullable();
            $table->string('percent', 256)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
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
		Schema::drop('tasks');
	}

}
