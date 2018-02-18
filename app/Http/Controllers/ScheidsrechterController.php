<?php

namespace App\Http\Controllers;

use App\Beurt;
use App\Sorting\BeurtCollectionSorter;

class ScheidsrechterController extends Controller
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
        $beurten = Beurt::where('gewicht', '!=', null)
            ->where('gehaald', '==', null)
            ->get();

        $beurten = $this->sorter->sort($beurten);

        return View(
            'scheidsrechter',
            [
                'volgendeBeurt' => $beurten->first(),
                'volgendeBeurten' => $beurten->slice(1, 5)
            ]
        );
    }
}
