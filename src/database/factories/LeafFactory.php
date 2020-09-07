<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Leaf;
use Faker\Generator as Faker;

$factory->define(Leaf::class, function (Faker $faker) {

    return [
        //
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'user_id' => rand(1,10)
    ];
});
