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
            $table->text('image');
            $table->text('description');
            $table->enum('stage',['Idea', 'Business Plan Drafted', 'Prototype Built', 'Product Tested', 'Paying Customers']);
            $table->text('problem');
            $table->text('solution');
            $table->text('benefits');
            $table->string('video');
            $table->string('website');
            $table->enum('searching',['Funding', 'Advisor/Mentor', 'Intern', 'Development', 'Business Plan', 'Co founders',
                'Marketing Plan', 'Sales', 'Networking', 'People', 'Ideas', 'Testing', 'Market Research']);
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
		Schema::drop('challenges');
	}

}
