<?php

namespace App\Http\Controllers;

use App\Lifter;

class WedstrijdleiderController extends Controller
{
    public function showLifts()
    {
        $lifters = Lifter::all();
        return View(
            'wedstrijdleider', [
            'lifters' => $lifters
        ]);
    }
}
