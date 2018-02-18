<?php

namespace App\Http\Controllers;

use App\Beurt;

class ScheidsrechterController extends Controller
{
    public function showWedstrijd()
    {
        $beurten = Beurt::all()
            ->squat()
            ->eerste()
            ->nogNietGedaan()
            ->sorteerOpGewicht();

        return View(
            'scheidsrechter',
            [
                'volgendeBeurt' => $beurten->first(),
                'volgendeBeurten' => $beurten->splice(1)
            ]
        );
    }
}
