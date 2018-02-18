<?php

namespace App\Sorting;

use App\Beurt;

class LiftSorter implements BeurtSorterInterface
{
    public function sort(Beurt $a, Beurt $b)
    {
        $prioA = $this->getLiftPrioForBeurt($a);
        $prioB = $this->getLiftPrioForBeurt($b);

        return $prioA <=> $prioB;
    }

    private function getLiftPrioForBeurt(Beurt $beurt)
    {
        $prios = [
            'squat' => 1,
            'bench' => 2,
            'deadlift' => 3
        ];
        if (!isset($prios[$beurt->lift])) {
            throw new \InvalidArgumentException(sprintf('Unexpected lift "%s" during beurt sorting', $beurt->lif));
        }
        return $prios[$beurt->lift];
    }
}
