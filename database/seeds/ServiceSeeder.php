<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Tin thường',
                'price_day' => 2000.0,
                'price_week' => 12000.0,
                'price_month' => 48000.0,
                'min_post_up' => 5,
            ],
            [
                'name' => 'Tin VIP 3',
                'price_day' => 10000,
                'price_week' => 63000,
                'price_month' => 240000,
                'min_post_up' => 8
            ],
            [
                'name' => 'Tin VIP 2',
                'price_day' => 20000,
                'price_week' => 133000,
                'price_month' => 540000,
                'min_post_up' => 9
            ],
            [
                'name' => 'Tin VIP 1',
                'price_day' => 30000,
                'price_week' => 190000,
                'price_month' => 800000,
                'min_post_up' => 10
            ],
            [
                'name' => 'Tin VIP nổi bật',
                'price_day' => 50000,
                'price_week' => 315000,
                'price_month' => 12000000,
                'min_post_up' => 12
            ]
        ]);
    }
}
