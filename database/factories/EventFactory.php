<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'venue' => $faker->unique()->safeEmail,
        'starts_at' => $faker->dateTime,
        'ticket_price' => $faker->numberBetween(100, 2000),
        'details' => $faker->paragraph,
        'active' => true,
    ];
});
