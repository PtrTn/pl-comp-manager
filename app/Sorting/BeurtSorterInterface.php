<?php

namespace App\Sorting;

use App\Beurt;

interface BeurtSorterInterface
{
    public function sort(Beurt $a, Beurt $b);
}
