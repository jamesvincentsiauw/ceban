<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Participant::class, function (Faker $faker) use ($factory) {
    return [
        'eventID' =>$factory->create(\App\Event::class)->eventID,
        'participantID' => Str::random(10),
        'participantName' => $faker->name,
        'participantEmail' => $factory->create(\App\User::class)->email,
        'phone'=>$faker->phoneNumber,
        'qty'=>random_int(1,5),
    ];
});
