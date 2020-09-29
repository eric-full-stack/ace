<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AssociateSportCourtPrice;
use Faker\Generator as Faker;

$factory->define(AssociateSportCourtPrice::class, function (Faker $faker) {

    return [
        'associate_sports_court_id' => $faker->word,
        'hours' => $faker->word,
        'amount' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
