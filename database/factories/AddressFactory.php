<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    return [
        'cep' => $faker->word,
        'street' => $faker->word,
        'district' => $faker->word,
        'city' => $faker->word,
        'state' => $faker->word,
        'number' => $faker->randomDigitNotNull,
        'complement' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
