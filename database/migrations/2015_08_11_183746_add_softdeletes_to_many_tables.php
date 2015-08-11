<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletesToManyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('mentors', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('notifications', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('tutorials', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropColumn('deleted_at');
        });
        Schema::table('mentors', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('tutorials', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
