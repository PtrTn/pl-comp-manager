<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lifter extends Model
{
    protected $fillable = [
        'lotnummer',
        'naam',
        'leeftijd',
        'gewichtsklasse',
        'bodyweight',
        'rekHoogteSquat',
        'rekHoogteBench'
    ];

    public function beurten()
    {
        return $this->hasMany(Beurt::class);
    }
}
