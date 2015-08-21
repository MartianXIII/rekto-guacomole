<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('body');

						//$table->integer('user_id')->unsigned();

						// $table->foreign('users_id')
						// 		->references('id')
						// 		->on('users');

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
		Schema::drop('posts');
	}

}
