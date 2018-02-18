<?php

namespace App\Sorting;

use App\Beurt;

class LotnummerSorter implements BeurtSorterInterface
{
    public function sort(Beurt $a, Beurt $b)
    {
        $lifterA = $a->lifter()->first();
        $lifterB = $b->lifter()->first();
        return $lifterA->lotnummer <=> $lifterB->lotnummer;
    }
}
