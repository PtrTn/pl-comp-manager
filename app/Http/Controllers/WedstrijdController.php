<?php

namespace App\Http\Controllers;

use App\Lifter;

class WedstrijdController extends Controller
{
    public function showLifts()
    {
        $lifters = Lifter::all();
        
        return View(
            'wedstrijd', [
                'lifters' => $lifters
            ]
        );
    }
}
