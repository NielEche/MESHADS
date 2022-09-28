<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(4);

    return [
        'title' => $title,
        'caption' => $faker->unique()->sentence(4),
        'top_content' => $faker->paragraph(5),
        'middle_content' => $faker->paragraph(5),
        'bottom_content' => $faker->paragraph(5),
        'slug' => str_slug($title),
        'is_published' => true,
    ];
});
