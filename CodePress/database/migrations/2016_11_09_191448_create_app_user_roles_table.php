<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_user_roles', function (Blueprint $table){
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('codepress_user');
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('app_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_user_roles');
    }
}
