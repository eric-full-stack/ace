<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tournament;
use Faker\Generator as Faker;

$factory->define(Tournament::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
