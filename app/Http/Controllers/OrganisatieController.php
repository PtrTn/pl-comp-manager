<?php

namespace App\Http\Controllers;

use App\Lifter;

class OrganisatieController extends Controller
{
    public function showLifters()
    {
        $lifters = Lifter::all();
        
        return View(
            'organisatie',
            [
                'lifters' => $lifters
            ]
        );
    }

    public function deleteLifter(Lifter $lifter)
    {
        $lifter->delete();
        return redirect()->back();
    }
}
