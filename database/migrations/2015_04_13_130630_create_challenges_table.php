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
            $table->text('description')->nullable();
            $table->integer('user_id')->unsigned();
            ////$table->enum('stage',['Idea', 'Business Plan Drafted', 'Prototype Built', 'Product Tested', 'Paying Customers'])->nullable();
            //$table->text('problem')->nullable();
            //$table->text('solution')->nullable();
            //$table->text('benefits')->nullable();
            //$table->string('video')->nullable();

            //$table->string('website')->nullable();
            //$table->enum('searching',['Funding', 'Advisor/Mentor', 'Intern', 'Development', 'Business Plan', 'Co founders',
            //    'Marketing Plan', 'Sales', 'Networking', 'People', 'Ideas', 'Testing', 'Market Research'])->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
