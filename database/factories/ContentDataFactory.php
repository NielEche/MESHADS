<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\ContentData::class, function (Faker $faker) {
	$url = $faker->sentence(1);
    return [
        'url' => $url,
        'slug' => str_slug($url),
        'is_enabled' => true,
    ];
});
