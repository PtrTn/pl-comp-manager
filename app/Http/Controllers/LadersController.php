<?php

namespace App\Http\Controllers;

use App\Beurt;
use App\BeurtenCollection;
use App\Sorting\BeurtCollectionSorter;

class LadersController extends Controller
{
    /**
     * @var BeurtCollectionSorter
     */
    private $sorter;

    public function __construct(BeurtCollectionSorter $sorter)
    {
        $this->sorter = $sorter;
    }

    public function showWedstrijd()
    {
        $beurten = $this->getVolgendeBeurten();

        $vorigeBeurten = $this->getVorigeBeurten();

        return View(
            'laders',
            [
                'vorigeBeurten' => $vorigeBeurten->slice(-3, 3),
                'volgendeBeurt' => $beurten->first(),
                'volgendeBeurten' => $beurten->slice(1, 5)
            ]
        );
    }

    private function getVolgendeBeurten(): BeurtenCollection
    {
        $beurten = Beurt::where('gewicht', '!=', null)
            ->whereNull('gehaald')
            ->get();

        return $this->sorter->sort($beurten);
    }

    private function getVorigeBeurten(): BeurtenCollection
    {
        $beurten = Beurt::where('gewicht', '!=', null)
            ->whereNotNull('gehaald')
            ->get();

        return $this->sorter->sort($beurten);
    }
}
