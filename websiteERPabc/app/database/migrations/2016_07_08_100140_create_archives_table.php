<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('archives', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('code', 256);
            $table->integer('type');
            $table->string('date_receive', 256);
            $table->string('date_send', 256);
            $table->string('date_promulgate', 256);
            $table->string('date_active', 256);
            $table->text('description');
            $table->string('file', 256);
            $table->integer('partner_id');
            $table->integer('result');
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
		Schema::drop('archives');
	}

}
