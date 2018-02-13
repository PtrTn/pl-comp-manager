<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lifter extends Model
{
    protected $fillable = [
        'naam',
        'gewichtsklasse',
        'bodyweight',
        'rekHoogteSquat',
        'rekHoogteBench',
        'squat1',
        'squat2',
        'squat3',
        'bench1',
        'bench2',
        'bench3',
        'deadlift1',
        'deadlift2',
        'deadlift3',
    ];
}
