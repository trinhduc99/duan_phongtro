<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $genderUser = ['None', 'Male', 'Female'];
    $postStatus = ['Approved', 'Pending', 'Denied'];
    $serviceType = ['Day', 'Week', 'Month'];
    $userType = ['Student', 'Household', 'Worker'];
    $electricCalculateMethod = ['Personal', 'Kwh', 'Negotiate'];
    $waterCalculateMethod = ['Personal', 'm3', 'Negotiate'];

    return [

        'title' => $faker->text(30),
        'description' => $faker->paragraph,
        'province_id' => rand(1, 63),
        'district_id' => rand(),
        'street_id' => rand(),
        'ward_id' => rand(),
        'address' => $faker->address,
        'price' => rand(1, 100000),
        'area' => rand(10, 1000),
        'category_id' => rand(1, 2),
        'gender_user' => $genderUser[rand(0, 2)],
        'user_type' => $userType[rand(0, 2)],
        'electric_price' => rand(1000, 10000),
        'electric_calculate_method' => $electricCalculateMethod[rand(0, 2)],
        'water_price' => rand(1000, 10000),
        'water_calculate_method' => $waterCalculateMethod[rand(0, 2)],
        'close_time' => rand(21, 24),
        'deposit' => rand(0, 12),
        'is_public' => rand(0, 1),
        'is_booked' => rand(0, 1),
        'is_deleted' => rand(0, 1),
        'in_duration' => rand(0, 1),
        'status' => $postStatus[rand(0, 2)],
        'creator_id' => rand(11, 30),
        'processor_id' => rand(1, 10),
        'start_date' => $faker->dateTime,
        'finish_date' => $faker->dateTime,
        'service_id' => rand(1, 5),
        'service_type' => $serviceType[rand(0, 2)],
        'number_day_up' => rand(5, 100),
        'slug' => $faker->slug

    ];
});
