<?php

use App\Beurt;
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
    ];
});

$factory->defineAs(Beurt::class, 'squat', function (Faker $faker) {
    return [
        'lift'        => 'squat',
        'beurtnummer' => 1,
        'gewicht'     => getRandomGewicht(),
        'gehaald'     => null,
    ];
});


$factory->defineAs(Beurt::class, 'bench', function (Faker $faker) {
    return [
        'lift'        => 'bench',
        'beurtnummer' => 1,
        'gewicht'     => getRandomGewicht(),
        'gehaald'     => null,
    ];
});


$factory->defineAs(Beurt::class, 'deadlift', function (Faker $faker) {
    return [
        'lift'        => 'deadlift',
        'beurtnummer' => 1,
        'gewicht'     => getRandomGewicht(),
        'gehaald'     => null,
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

function getRandomGewicht(): ?float
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