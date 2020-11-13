<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Phòng trọ, nhà trọ',
            'slug' => \Illuminate\Support\Str::slug('Phòng trọ, nhà trọ')
        ]);
        DB::table('categories')->insert([
                'name' => 'Tìm người ở ghép',
                'slug' => \Illuminate\Support\Str::slug('Tìm người ở ghép')
        ]);
    }
}
