<?php

use CodePress\CodeUser\Models\Permission;
use CodePress\CodeUser\Models\Role;
use Illuminate\Database\Migrations\Migration;

class CreateAclData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $roleAdmin = Role::create([
            'name' => Role::ROLE_ADMIN
        ]);
        $roleEditor = Role::create([
            'name' => Role::ROLE_EDITOR
        ]);
        $roleRedactor = Role::create([
            'name' => Role::ROLE_REDATOR
        ]);

        $permissionPublishPost = Permission::create([
           'name' => 'publish_post',
            'description' => 'Publish draft post permission'
        ]);

        $roleEditor->permissions()->save($permissionPublishPost);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
