<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 12/11/2018
 * Time: 14:12
 */
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->unique()->safeEmail,
        'image' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'thumbnail' => str_random(10),
        'price' => 23,

        ];
});
