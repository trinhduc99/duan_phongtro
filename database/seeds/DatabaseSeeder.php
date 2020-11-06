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
         $this->call([
             GroupUserSeeder::class,
             CategoriesSeeder::class,
             ServiceSeeder::class,
             FakePostData::class,
             FakePostInterestData::class,
             FakePostRecentData::class,
//             FakeUserSeeder::class,
         ]);
    }
}
