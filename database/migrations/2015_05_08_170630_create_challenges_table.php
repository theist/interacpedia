<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('challenges', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->text('image')->nullable();
            $table->text('images')->nullable();
            $table->text('files')->nullable();
            $table->text('description')->nullable();
            $table->text('solution')->nullable();
            $table->text('benefits')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->enum('actual_stage',['idea', 'businessplan', 'prototype', 'product', 'customers'])->nullable();
            $table->enum('desired_stage',['businessplan', 'prototype', 'product', 'customers'])->nullable();
            $table->string('website')->nullable();
            $table->string('video')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('type_id')
                ->references('id')
                ->on('challenge_types')
                ->onDelete('set null');
            $table->foreign('category_id')
                ->references('id')
                ->on('challenge_categories')
                ->onDelete('set null');
        });
        Schema::create('challenge_user', function(Blueprint $table)
        {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('challenge_user');
        Schema::drop('challenges');
	}

}
