<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterWorkplace extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workplaces', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('file_en');
			$table->string('file_sw');
			$table->string('title_en');
			$table->string('title_sw');
			$table->string('content_en');
			$table->string('content_sw');
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
		Schema::drop('workplaces');
	}

}
