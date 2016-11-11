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


        $permissionPublishPosts = Permission::create([
            'name' => 'posts_publish',
            'description' => 'Publish draft post permission'
        ]);

        $permissionAccessPosts = Permission::create([
            'name' => 'posts_access',
            'description' => 'Access posts area permission'
        ]);

        $permissionAccessCategories = Permission::create([
            'name' => 'categories_access',
            'description' => 'Access categories area permission'
        ]);

        $permissionAccessTags = Permission::create([
            'name' => 'tags_access',
            'description' => 'Access tags area permission'
        ]);

        $permissionAccessUsers = Permission::create([
            'name' => 'users_access',
            'description' => 'Access users area permission'
        ]);

        $permissionAccessRoles = Permission::create([
            'name' => 'roles_access',
            'description' => 'Access roles area permission'
        ]);

        $permissionAccessPermissions = Permission::create([
            'name' => 'permissions_access',
            'description' => 'Access permissions area permission'
        ]);

        $roleAdmin->permissions()->save($permissionPublishPosts);
        $roleAdmin->permissions()->save($permissionAccessPosts);
        $roleAdmin->permissions()->save($permissionAccessCategories);
        $roleAdmin->permissions()->save($permissionAccessTags);
        $roleAdmin->permissions()->save($permissionAccessUsers);
        $roleAdmin->permissions()->save($permissionAccessRoles);
        $roleAdmin->permissions()->save($permissionAccessPermissions);


        $roleEditor->permissions()->save($permissionAccessPosts);
        $roleEditor->permissions()->save($permissionAccessCategories);
        $roleEditor->permissions()->save($permissionAccessTags);
        $roleEditor->permissions()->save($permissionAccessUsers);


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