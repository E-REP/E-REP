<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\User;
use App\Vote;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'receiver_id' => factory(App\User::class),
        'description' => $faker->paragraph,
        'value' => $faker->randomElement(array(-1, 1))
    ];
});
