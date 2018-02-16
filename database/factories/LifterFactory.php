<?php

use App\Lifter;
use Faker\Generator as Faker;

$factory->define(Lifter::class, function (Faker $faker) {
    return [
        'lotnummer'      => rand(1, 50),
        'naam'           => getRandomName(),
        'leeftijd'       => rand(18, 30),
        'gewichtsklasse' => getRandomGewichtsklasse(),
        'bodyweight'     => getRandomBodyweight(),
        'rekHoogteSquat' => getRandomRekhoogte(),
        'rekHoogteBench' => getRandomRekhoogte(),
        'squat1'         => getRandomLift(),
        'squat2'         => getRandomLift(),
        'squat3'         => getRandomLift(),
        'bench1'         => getRandomLift(),
        'bench2'         => getRandomLift(),
        'bench3'         => getRandomLift(),
        'deadlift1'      => getRandomLift(),
        'deadlift2'      => getRandomLift(),
        'deadlift3'      => getRandomLift(),
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

function getRandomGewichtsklasse()
{
    return array_random([
        null,
        '56kg',
        '63kg',
        '74kg',
        '83kg',
        '105kg',
        '120kg',
        '+120kg',
    ]);
}

function getRandomBodyweight()
{
    return array_random([
        null,
        80.5,
        95,
        140.3,
        50,
        63,
        75
    ]);
}

function getRandomRekhoogte()
{
    return array_random([
        null,
        10,
        11,
        12,
        13,
        14,
        15
    ]);
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
