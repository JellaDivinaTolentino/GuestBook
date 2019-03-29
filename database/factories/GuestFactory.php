<?php

use Faker\Generator as Faker;
use App\Guest;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'gender' => 'Male',
        'address' => $faker->address
    ];
});
