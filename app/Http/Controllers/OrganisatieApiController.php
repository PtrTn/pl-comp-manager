<?php

namespace App\Http\Controllers;

use App\Lifter;
use Illuminate\Http\Request;

class OrganisatieApiController extends Controller
{
    public function updateLifter(Request $request)
    {
        $id = $request->request->get('pk');
        $name = $request->request->get('name');
        $value = $request->request->get('value');

        /** @var Lifter|null $lifter */
        $lifter = Lifter::find($id);

        if(!isset($id, $name, $lifter)) {
            return response()->json([], 400);
        }

        if (in_array($name, $this->lifterProperties())) {
            $lifter->$name = $value;
            $lifter->save();
            return response()->json([]);
        }

        if (in_array($name, $this->beurtProperties())) {
            $beurt = $lifter->beurten()->firstOrCreate([
                'lift' => substr($name, 0, -1),
                'beurtnummer' => substr($name, -1),
            ]);
            $beurt->update([
               'gewicht' => $value,
               'gehaald' => false,
            ]);
            $lifter->beurten()->save($beurt);
            return response()->json([]);
        }

        return response()->json([], 400);
    }

    public function addLifter(Request $request)
    {
        $value = $request->request->get('value');
        if (!isset($value)) {
            return response()->json([], 400);
        }

        $lifter = Lifter::create(['naam' => $value]);
        $lifter->save();

        return response()->json([]);
    }

    private function lifterProperties() {
        return [
            'lotnummer',
            'naam',
            'leeftijd',
            'gewichtsklasse',
            'bodyweight',
            'rekHoogteSquat',
            'rekHoogteBench'
        ];
    }

    private function beurtProperties() {
        return [
          'squat1',
          'squat2',
          'squat3',
          'squat4',
          'bench1',
          'bench2',
          'bench3',
          'bench4',
          'deadlift1',
          'deadlift2',
          'deadlift3',
          'deadlift4',
        ];
    }
}
