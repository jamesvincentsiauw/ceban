<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) use ($factory) {
    return [
        'eventID' => $factory->create(\App\Participant::class)->eventID,
        'participantID' => $factory->create(\App\Participant::class)->participantID,
        'ticketFile' => 'to be announced'
    ];
});
