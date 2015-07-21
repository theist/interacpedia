<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('university_id')->after('name')->nullable()->unsigned();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('set null');
            $table->string('image')->after('hashtag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('university_id');
            $table->dropColumn('image');
        });
    }
}
