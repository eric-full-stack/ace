<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {

    return [
        'birth_date' => $faker->word,
        'picture' => $faker->word,
        'gender_id' => $faker->word,
        'user_id' => $faker->word,
        'mmr' => $faker->randomDigitNotNull,
        'level' => $faker->randomDigitNotNull,
        'latitute' => $faker->word,
        'longitute' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
