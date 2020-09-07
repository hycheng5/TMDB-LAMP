<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        //this is for seeindg some example values into the movie table
        'movie_id' => $faker->randomElement([24428,99861,14611]),
        'user_id' => 1,
        'overview'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'releaseDate' => "9/3/2020",
        'title' => $faker->name

    ];
});
