<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuicklinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quick_links', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_en');
			$table->string('title_sw');
			$table->string('url');
			$table->boolean('is_published')->default(0);
			$table->integer('user_id')->unsigned();
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
		Schema::drop('quick_links');
	}

}
