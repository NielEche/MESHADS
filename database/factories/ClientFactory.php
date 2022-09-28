<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Client::class, function (Faker $faker) {
    return [
        'website' => $faker->url,
        'image_name' =>$faker->sentence(4),
        'image_url' => $faker->url,
        'is_visible' => true,
    ];
});
