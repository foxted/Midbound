<?php

$factory->define(Midbound\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->companyEmail,
        'password' => $password ?: $password = bcrypt('secret')
    ];
});

$factory->define(Midbound\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->define(Midbound\Website::class, function (Faker\Generator $faker) {
    return [
        'hash' => 'MB-'.Hashids::connection('websites')->encode($faker->randomDigitNotNull).'-'.$faker->randomDigitNotNull,
        'url' => 'http://'.$faker->domainName
    ];
});

$factory->define(Midbound\Prospect::class, function (Faker\Generator $faker) {
    return [
        'team_id' => 1,
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'created_at' => $faker->dateTimeBetween('-3 months')
    ];
});

$factory->define(Midbound\Visitor::class, function (Faker\Generator $faker) {
    return [
        'guid' => $faker->uuid
    ];
});

$factory->define(Midbound\VisitorEvent::class, function (Faker\Generator $faker) {
    return [
        'action' => $faker->randomElement(config('tracking.allowed-events')),
        'url' => $faker->url,
        'resource' => $faker->randomElement([$faker->word.'.'.$faker->fileExtension, ''])
    ];
});