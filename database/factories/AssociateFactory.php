<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Associate;
use Faker\Generator as Faker;

$factory->define(Associate::class, function (Faker $faker) {

    return [
        'reputation' => $faker->randomDigitNotNull,
        'cnpj' => $faker->word,
        'opening_time' => $faker->word,
        'closing_time' => $faker->word,
        'cpf' => $faker->word,
        'rg' => $faker->word,
        'emissor' => $faker->word,
        'bank' => $faker->word,
        'agency' => $faker->word,
        'account' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
