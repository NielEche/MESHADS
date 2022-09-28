<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Project::class, function (Faker $faker) {
	$title = $faker->unique()->sentence(4);

    return [
        'title' => $title,
        'caption' => $faker->sentence(8),
		'slug' => str_slug($title),
		'category_id' => \App\Models\Category::inRandomOrder()->first('id')->id,
		'is_visible' => true,
		'client_name' => $faker->name,
		'project_brief' => $faker->paragraph(5),
    ];
});
