<?php

use Illuminate\Database\Seeder;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_users')->insert([
            ['name' => 'Admin', 'group_name' => 'admin'],
            ['name' => 'User', 'group_name' => 'user']
        ]);
//        DB::table('users')->insert([
//            ['name' => 'Admin', 'group_id' => '1'],
//            ['name' => 'hopdt', 'group_id' => '2']
//        ]);
    }
}
