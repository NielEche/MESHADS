<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'job_title' => $faker->jobTitle,
        'bio' => $faker->sentence(35),
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'instagram' => $faker->url,
		'is_visible' => true,
        'linkedin' => $faker->url,
        'github' => $faker->url,
        'pintrest' => $faker->url,
    ];
});
