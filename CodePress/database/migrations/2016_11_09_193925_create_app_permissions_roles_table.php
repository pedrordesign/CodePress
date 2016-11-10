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
            $table->integer('permission_id');
            $table->foreign('permission_id')->references('id')->on('app_permissions');
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
