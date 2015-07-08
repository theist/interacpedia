<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassToUserchallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenge_user', function (Blueprint $table) {
            $table->integer('classgroup_id')->nullable()->unsigned()->index();
            $table->foreign('classgroup_id')->references('id')->on('classgroups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenge_user', function (Blueprint $table) {
            $table->dropColumn('classgroup_id');
        });
    }
}
