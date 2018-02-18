<?php

namespace App\Sorting;

use App\Beurt;

class GewichtSorter implements BeurtSorterInterface
{
    public function sort(Beurt $a, Beurt $b)
    {
        return $a->gewicht <=> $b->gewicht;
    }
}
