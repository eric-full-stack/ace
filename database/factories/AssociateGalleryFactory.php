<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AssociateGallery;
use Faker\Generator as Faker;

$factory->define(AssociateGallery::class, function (Faker $faker) {

    return [
        'associate_id' => $faker->word,
        'picture' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
