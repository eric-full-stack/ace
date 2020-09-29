<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sport;
use Faker\Generator as Faker;

$factory->define(Sport::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'popularity' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
