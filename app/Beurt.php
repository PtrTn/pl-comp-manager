<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beurt extends Model
{
    protected $table = 'beurten';

    protected $fillable = [
        'lift',
        'beurtnummer',
        'gewicht',
        'gehaald',
    ];

    public function newCollection(array $models = [])
    {
        return new BeurtenCollection($models);
    }
}
