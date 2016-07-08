<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('archive_users', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_receive');
            $table->integer('user_send');
            $table->integer('archive_id');
            $table->text('comment');
            $table->integer('status');
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
