<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Slider::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'caption' => $faker->sentence(8),
        'link_url' => $faker->url,
        'link_text' => $faker->sentence(2),
        'type' => 'image',
        'file_url' => $faker->url,
        'file_name' => $faker->sentence(2),
        'order_number' => $faker->numberBetween(1, 5),
        'is_visible' => true,
    ];
});
