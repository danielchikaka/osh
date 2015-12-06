<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trainings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_en');
			$table->string('title_sw');
			$table->string('duration');
			$table->string('location');
			$table->string('fees');
			$table->text('summary_en');
			$table->text('start_date');
			$table->text('end_date');
			$table->text('summary_sw');
			$table->text('content_en');
			$table->text('content_sw');
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
		Schema::drop('trainings');
	}

}
