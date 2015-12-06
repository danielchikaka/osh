<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('title_en');
			$table->string('title_sw');
			$table->text('summary_en');
			$table->text('summary_sw');
			$table->text('content_en');
			$table->text('content_sw');
			$table->string('filename')->nullable();
			$table->string('filepath')->nullable();
			$table->string('author');
			$table->integer('user_id')->unsigned();
			$table->boolean('is_published')->default(0);
			$table->string('slug')->nullable();


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
		Schema::drop('news');
	}

}
