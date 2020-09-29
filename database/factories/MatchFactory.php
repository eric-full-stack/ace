<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Match;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'associate_sports_court_id' => $faker->word,
        'winner' => $faker->word,
        'winner_type' => $faker->word,
        'schedule' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
