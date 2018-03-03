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
        $huidigeBeurt = $beurten->first();

        $plates = null;
        if ($huidigeBeurt !== null) {
            $plates = $this->calculator->getPlatesForWeight($huidigeBeurt->gewicht);
        }

        return View(
            'laders',
            [
                'huidigeBeurt'  => $huidigeBeurt,
                'volgendeBeurt' => $beurten->slice(1, 1)->first(),
                'plates'        => $plates,
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
}
