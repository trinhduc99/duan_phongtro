<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'lease', 'slug' => 'thue'],
            ['name' => 'sheltered housing' , 'slug' => 'tim-nguoi-o-ghep']
        ]);
    }
}
