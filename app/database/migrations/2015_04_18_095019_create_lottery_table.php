<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drawings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('drawing_at');
		});
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('drawing_id')->unsigned();
			$table->foreign('drawing_id')->references('id')->on('drawings');
			$table->index('user_id');
			$table->index('drawing_id');
		});
		Schema::create('tips', function(Blueprint $table)
		{
			$table->integer('ticket_id')->unsigned();
			$table->foreign('ticket_id')->references('id')->on('tickets');
			$table->index('ticket_id');
			$table->integer('number')->unsigned();
		});
		Schema::create('winings', function(Blueprint $table)
		{
			$table->integer('drawing_id')->unsigned();
			$table->foreign('drawing_id')->references('id')->on('drawings');
			$table->index('drawing_id');
			$table->integer('number')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('winings');
		Schema::drop('tips');
		Schema::drop('lottery');
		Schema::drop('drawings');
	}

}
