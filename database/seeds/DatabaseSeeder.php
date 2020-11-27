<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name'     => 'admin',
//            'email'    => 'admin@admin.com',
//            'amount'    => '200000',
//            'password' => Hash::make('password'),
//            'phone'=>'0988746131',
//        ]);
//         $this->call(CategorySeeder::class);
//         $this->call(SqlSeeder::class);
         $this->call(ItemSeeder::class);
    }
}
