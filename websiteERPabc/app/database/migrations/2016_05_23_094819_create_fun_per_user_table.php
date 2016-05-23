<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunPerUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fun_button_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('fun_id')->nullable();
            $table->integer('button_id')->nullable();
            $table->integer('user_id')->nullable();
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
		Schema::drop('fun_button_user');
	}

}
