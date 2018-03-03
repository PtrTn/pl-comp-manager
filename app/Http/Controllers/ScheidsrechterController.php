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

        $beurten = $this->getVolgendeBeurten();

        $vorigeBeurten = $this->getVorigeBeurten();

        return View(
            'scheidsrechter',
            [
                'form' => $form,
                'vorigeBeurten' => $vorigeBeurten->slice(-3, 3)->reverse(),
                'volgendeBeurt' => $beurten->first(),
                'volgendeBeurten' => $beurten->slice(0, 5)->reverse()
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

        $formValue = $request->request->get('gehaald');
        $gehaald = false;
        if ($formValue === 'approved') {
            $gehaald = true;
        }

        $vorigeBeurt = $this->getVolgendeBeurten()->first();
        $vorigeBeurt->update([
            'gehaald' => $gehaald
        ]);

        return redirect()->to('scheidsrechter');
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
