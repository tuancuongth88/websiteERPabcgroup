<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDomainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_domains', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('username', 256);
            $table->string('password', 256);
            $table->string('url_login', 256);
            $table->string('start_date', 256);
            $table->string('end_date', 256);
            $table->string('provider', 256);
            $table->text('provider_contact');
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
		Schema::drop('resource_domains');
	}

}
