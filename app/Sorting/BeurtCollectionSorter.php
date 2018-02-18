<?php

namespace App\Sorting;

use App\Beurt;
use App\BeurtenCollection;

class BeurtCollectionSorter
{
    /**
     * @var BeurtSorterInterface[]|array
     */
    private $sorters;

    /**
     * BeurtCollectionSorter constructor.
     * @param BeurtSorterInterface[] $sorters
     */
    public function __construct(array $sorters)
    {
        $this->sorters = $sorters;
    }

    public function sort(BeurtenCollection $collection)
    {
        return $collection->sort(function (Beurt $a, Beurt $b) {
            foreach ($this->sorters as $sorter) {
                $result = $sorter->sort($a, $b);
                if ($result !== 0) {
                    return $result;
                }
            }
            return 0;
        });
    }
}
