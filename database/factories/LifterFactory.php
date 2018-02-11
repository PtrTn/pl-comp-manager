<?php

use App\Lifter;
use Faker\Generator as Faker;

$factory->define(Lifter::class, function (Faker $faker) {
    return [
        'naam'      => getRandomName(),
        'squat1'    => getRandomLift(),
        'squat2'    => getRandomLift(),
        'squat3'    => getRandomLift(),
        'bench1'    => getRandomLift(),
        'bench2'    => getRandomLift(),
        'bench3'    => getRandomLift(),
        'deadlift1' => getRandomLift(),
        'deadlift2' => getRandomLift(),
        'deadlift3' => getRandomLift(),
    ];
});

function getRandomName(): string
{
    $firstName = array_random([
        'Vito',
        'Tymen',
        'Erik',
        'Karel',
        'Yvonne',
        'Jurri',
        'Peter',
        'Cemil',
        'Kenley'
    ]);
    $lastName = array_random([
        'Minheere',
        'Gerestein',
        'Smallegange',
        'Kodde',
        'Kortsmit',
        'Gerritsen',
        'Ton',
        'Car',
        'Simons',
    ]);

    return $firstName . ' ' . $lastName;
}

function getRandomLift(): ?float
{
    return array_random([
        null,
        100,
        120,
        140,
        160,
        200,
        300
    ]);
}
