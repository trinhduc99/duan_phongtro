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
        DB::table('users')->insert([
            ['name' => 'Admin', 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt', 'group_id' => '2', 'phone' => '0352342341', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],
            ['name' => 'hopdt'.rand(1, 100), 'group_id' => '1', 'phone' => '0234123234', 'amount' => rand(100, 10000000)],

        ]);
    }
}
