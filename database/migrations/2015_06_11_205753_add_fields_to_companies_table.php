<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function(Blueprint $table)
		{
            $table->text('description')->nullable()->after('name');
            $table->integer('user_id')->unsigned()->nullable()->after('description');
            $table->text('image')->nullable()->after('description');
            $table->text('images')->nullable()->after('image');

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
		Schema::table('companies', function(Blueprint $table)
		{
            $table->dropForeign('companies_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('images');
        });
	}

}
