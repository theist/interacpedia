<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('universities', function (Blueprint $table) {
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
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('universities', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
