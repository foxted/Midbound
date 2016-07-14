<?php

$factory->define(Midbound\Prospect::class, function (Faker\Generator $faker) {
    return [
        'team_id' => 1,
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'created_at' => $faker->dateTimeBetween('-3 months')
    ];
});
