<?php

namespace App\Http\Controllers;

use App\Beurt;
use App\BeurtenCollection;
use App\Sorting\BeurtCollectionSorter;
use App\Weights\PlateCalculator;

class LadersController extends Controller
{
    /**
     * @var BeurtCollectionSorter
     */
    private $sorter;
    /**
     * @var PlateCalculator
     */
    private $calculator;

    public function __construct(
        BeurtCollectionSorter $sorter,
        PlateCalculator $calculator
    ) {
        $this->sorter = $sorter;
        $this->calculator = $calculator;
    }

    public function showWedstrijd()
    {
        $beurten = $this->getVolgendeBeurten();

        $vorigeBeurten = $this->getVorigeBeurten();

        $volgendeBeurt = $beurten->first();

        $plates = null;
        if ($volgendeBeurt !== null) {
            $plates = $this->calculator->getPlatesForWeight($volgendeBeurt->gewicht);
        }

        return View(
            'laders',
            [
                'vorigeBeurten'   => $vorigeBeurten->slice(-3, 3),
                'volgendeBeurt'   => $volgendeBeurt,
                'volgendeBeurten' => $beurten->slice(1, 5),
                'plates'          => $plates,
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
