<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(
            ['name' => 'Admin'],
            ['name' => 'User'],
            ['name' => 'Guest']
        );

        $permission = Permission::create(
            /* Group Post*/
            ['name' => 'search post'], // every one
            ['name' => 'create post'] , // user
            ['name' => 'update post content'], // 'user' update when pending
            ['name' => 'update post status'], // admin update when pending
            ['name' => 'delete post'], // 'user'

            ['name' => 'management post'], // user
            ['name' => 'admin management post'], // admin
            /* Group service */
            [],
            ['name' => 'read service']
        );

    }
}
