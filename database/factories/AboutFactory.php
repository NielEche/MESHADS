<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\About::class, function (Faker $faker) {
    return [
        'brief' => $faker->paragraph(14),
		'quote' => $faker->sentence(7),
		'quote_author' => $faker->name,
    ];
});
