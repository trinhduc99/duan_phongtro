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
         $this->call(CategorySeeder::class);
//        DB::table('users')->insert([
//            'name'     => 'admin',
//            'email'    => 'admin@admin.com',
//            'amount'    => '200000',
//            'password' => Hash::make('password'),
//            'phone'=>'098765432',
//        ]);
    }
}
