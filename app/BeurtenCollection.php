<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;

class BeurtenCollection extends Collection
{
    public function squat()
    {
        return $this->where('lift', 'squat');
    }
    public function bench()
    {
        return $this->where('lift', 'bench');
    }
    public function deadlift()
    {
        return $this->where('lift', 'deadlift');
    }

    public function eerste()
    {
        return $this->where('beurtnummer', 1);
    }

    public function tweede()
    {
        return $this->where('beurtnummer', 2);
    }

    public function derde()
    {
        return $this->where('beurtnummer', 3);
    }

    public function vierde()
    {
        return $this->where('beurtnummer', 4);
    }

    public function gewicht()
    {
        return $this->first()->gewicht ?? null;
    }
}
