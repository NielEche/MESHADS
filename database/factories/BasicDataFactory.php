<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\BasicData::class, function (Faker $faker) {
    return [
        'short_name' => 'Mesh',
        'full_name' => 'Mesh',
    ];
});
