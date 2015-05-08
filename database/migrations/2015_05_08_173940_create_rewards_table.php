<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rewards', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        });
        Schema::create('challenge_reward', function(Blueprint $table)
        {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('reward_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('reward_id')->references('id')->on('rewards')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('challenge_reward');
        Schema::drop('rewards');
	}

}
