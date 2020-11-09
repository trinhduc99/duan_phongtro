<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInterest;
use Faker\Generator as Faker;
use App\Post;
use App\User;

$factory->define(PostInterest::class, function (Faker $faker) {
    return [
        'post_id' => rand(1, Post::$NUMBER_RECORD_FAKE),
        'user_id' => rand(1, User::$NUMBER_RECORD_FAKE)
    ];
});
