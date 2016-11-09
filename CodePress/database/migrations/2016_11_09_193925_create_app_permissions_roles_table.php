<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppPermissionsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_permissions_roles', function (Blueprint $table){
            $table->integer('permissions_id');
            $table->foreign('permissions_id')->references('id')->on('codepress_permissions');
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
        Schema::drop('app_permissions_roles');
    }
}
