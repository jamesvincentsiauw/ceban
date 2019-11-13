<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Owner;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Owner::class, function (Faker $faker) use ($factory) {
    return [
        'email' => $factory->create(\App\User::class)->email,
        'organizationName' => $faker->company,
    ];
});
