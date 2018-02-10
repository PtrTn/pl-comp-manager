<?php

use App\Lifter;
use Faker\Generator as Faker;

$factory->define(Lifter::class, function (Faker $faker) {
    return [
        'naam' => str_random(10),
        'squat1' => rand(100, 300),
        'squat2' => rand(100, 300),
        'squat3' => rand(100, 300),
        'bench1' => rand(100, 300),
        'bench2' => rand(100, 300),
        'bench3' => rand(100, 300),
        'deadlift1' => rand(100, 300),
        'deadlift2' => rand(100, 300),
        'deadlift3' => rand(100, 300),
    ];
});
