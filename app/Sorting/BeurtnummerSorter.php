<?php

namespace App\Sorting;

use App\Beurt;

class BeurtnummerSorter implements BeurtSorterInterface
{
    public function sort(Beurt $a, Beurt $b)
    {
        return $a->beurtnummer <=> $b->beurtnummer;
    }
}
