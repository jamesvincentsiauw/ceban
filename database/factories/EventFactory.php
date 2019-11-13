<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Event::class, function (Faker $faker) use ($factory) {
    $cat=['Concert','Workshop','Seminar','Other','Competition','Social'];
    return [
        'eventID' =>Str::random(10),
        'poster' =>'to be announced',
        'eventName'=> $faker->domainName,
        'category'=> $faker->randomElement($cat),
        'location'=>$faker->streetAddress,
        'price'=>"Rp " . number_format('50000',2,',','.'),
        'organizationName' => $factory->create(\App\Owner::class)->organizationName,
        'eventDate' => $faker->date(),
        'availableMaximumTicket'=>$faker->numberBetween(100,200),
        'status'=>'Active'
    ];
});
