<?php

namespace App\Http\Controllers;

use App\Beurt;
use App\BeurtenCollection;
use App\Froms\ScheidsrechterForm;
use App\Sorting\BeurtCollectionSorter;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

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

    public function showWedstrijd(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ScheidsrechterForm::class, [
            'method' => 'POST',
            'url'    => route('scheidsrechter.approveLift')
        ]);

        $beurten = $this->getUpcomingBeurten();

        return View(
            'scheidsrechter',
            [
                'form' => $form,
                'volgendeBeurt' => $beurten->first(),
                'volgendeBeurten' => $beurten->slice(1, 5)
            ]
        );
    }

    public function approveLift(Request $request, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ScheidsrechterForm::class, [
            'method' => 'POST',
            'url'    => route('scheidsrechter.approveLift')
        ]);

        if (!$form->isValid() || !$request->request->has('gehaald')) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $beurten = $this->getUpcomingBeurten();


        $vorigeBeurt = $beurten->first();
        $formValue = $request->request->get('gehaald');
        $gehaald = false;
        if ($formValue === 'approved') {
            $gehaald = true;
        }
        $vorigeBeurt->update([
            'gehaald' => $gehaald
        ]);

        // Handle next.
        return View(
            'scheidsrechter',
            [
                'form' => $form,
                'volgendeBeurt' => $beurten->slice(1, 1)->first(),
                'volgendeBeurten' => $beurten->slice(2, 5)
            ]
        );
    }

    private function getUpcomingBeurten(): BeurtenCollection
    {
        $beurten = Beurt::where('gewicht', '!=', null)
            ->whereNull('gehaald')
            ->get();

        return $this->sorter->sort($beurten);
    }
}
