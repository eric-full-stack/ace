<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {

    return [
        'uuid' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->word,
        'picture' => $faker->word,
        'reputation' => $faker->randomDigitNotNull,
        'mmr' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
