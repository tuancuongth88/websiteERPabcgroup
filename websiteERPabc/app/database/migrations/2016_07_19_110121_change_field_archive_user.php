<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldArchiveUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('archive_users');
		Schema::create('archive_users', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_receive');
            $table->integer('user_send');
            $table->integer('archive_id');
            $table->integer('fun_id');
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
		Schema::drop('archive_users');
	}

}
